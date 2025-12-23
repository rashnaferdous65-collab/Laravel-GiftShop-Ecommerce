<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\SUpport\Facades\Auth;
use Stripe;
use Session;


class HomeController extends Controller
{
    public function index(){
        $user= User::where('usertype', 'user')->get()->count();
        $product= Product::all()->count();
        $order= Order::all()->count();
   $delivered = Order::where('status', 'Delivered')->orWhere('status', 'Deliverd')->count();
    if(auth()->check() && auth()->user()->usertype === 'admin') {
        return view('admin.index', compact('user','product', 'order','delivered')); 
    }
    
    return view('dashboard'); 
}

public function home()
{
    $product = Product::all();

    if (Auth::check()) {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    } else {
        $count = 0;
    }

    return view('home.index', compact('product', 'count'));
  }

   public function login_home()
  {
     $product = Product::all();

     $user= Auth::user();
     $userid= $user->id;
     $count = Cart::where('user_id', $userid)->count();

    return view('home.index' ,compact('product', 'count'));
  }

  public function shop()
{
    $product = Product::all();
      $user= Auth::user();
     $userid= $user->id;
     $count = Cart::where('user_id', $userid)->count();   
    return view('home.shop', compact('product', 'count'));
}


public function product_details($id)
{
    $product = Product::find($id); 
    if(!$product){
        return view('home.product_details', ['product' => null]);
    }
    return view('home.product_details', compact('product'));
}

public function add_cart($id)
{
    try {

        $user = Auth::user();

        if (!$user) {
            flash()->error('You must be logged in to add products to the cart.', [
                'title' => 'Login Required'
            ]);
            return redirect()->back();
        }

        $data = new Cart;
        $data->user_id = $user->id;
        $data->product_id = $id;
        $data->save();

        // 🔥 Success message
        flash()->success('Product added to cart successfully.', [
            'title' => 'Added'
        ]);

        return redirect()->back();

    } catch (\Exception $e) {

        // ❌ Error message
        flash()->error('Something went wrong while adding to cart.', [
            'title' => 'Error'
        ]);

        return redirect()->back();
    }
}


    public function my_cart(){

        if(Auth::id()){


            $user= Auth::user();
            $userid = $user->id;

            
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();    
        }

        return view('home.my_cart', compact('count', 'cart'));
    }

public function delete_cart($id)
{
    $cart = Cart::find($id);

    if (!$cart) {
        flash()->error('Cart item not found.', [
            'title' => 'Error'
        ]);
        return redirect()->back();
    }

    $cart->delete();

    flash()->success('Item removed from cart.', [
        'title' => 'Removed'
    ]);

    return redirect()->back();
}

public function confirm_order(Request $request)
{
    try {

        $user = Auth::user();

        if (!$user) {
            flash()->error('You must be logged in to confirm an order.', [
                'title' => 'Login Required'
            ]);
            return redirect()->back();
        }

        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = $user->id;

        $cart = Cart::where('user_id', $userid)->get();

        if ($cart->isEmpty()) {
            flash()->error('Your cart is empty.', [
                'title' => 'Error'
            ]);
            return redirect()->back();
        }

        foreach ($cart as $carts) {
            $order = new Order();
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $carts->product_id;
            $order->save();
        }

        // Remove cart items
        Cart::where('user_id', $userid)->delete();

        flash()->success('Your order has been confirmed successfully!', [
            'title' => 'Order Confirmed'
        ]);

        return redirect()->back();

    } catch (\Exception $e) {

        flash()->error('Something went wrong while confirming the order.', [
            'title' => 'Error'
        ]);

        return redirect()->back();
    }
}


public function my_order(){

$user= Auth::user()->id;
$order= Order::where('user_id', $user)->get();
$count=Cart::where('user_id', $user)->get()->count();
    return view('home.order', compact('count', 'order'));
}

 public function stripe()

    {

        return view('home.stripe');

    }

    public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => 100 * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment complete" 

        ]);
       
           
         $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;
         $userid= Auth::user()->id;
         $cart= Cart::where('user_id', $userid)->get();

  
    $cart = Cart::where('user_id', $userid)->get();

    foreach ($cart as $carts) {

        $order = new Order();
        $order->name = $name;
        $order->rec_address = $address;
        $order->phone = $phone;
        $order->user_id = $userid;
        $order->payment_status = "paid";
        $order->save();
    }
    

    $cart_remove = Cart::where('user_id', $userid)->get();

    foreach($cart_remove as $remove)
    {

      $data= Cart::find($remove->id);

      $data->delete();
    }
    Session::flash('success', 'Payment successful!');
 return redirect('my_cart');
}

public function add_shop()
{
    $product = Product::all();

    if (Auth::check()) {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    } else {
        $count = 0;
    }

    return view('home.add_shop', compact('product', 'count'));
  }

  public function why()
{
   
    if (Auth::check()) {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    } else {
        $count = 0;
    }

    return view('home.why', compact( 'count'));
  }
public function testimonial()
{
   
    if (Auth::check()) {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    } else {
        $count = 0;
    }

    return view('home.testimonial', compact( 'count'));
  }

  public function add_contact()
{
   
    if (Auth::check()) {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    } else {
        $count = 0;
    }

    return view('home.add_contact', compact( 'count'));
  }


}
