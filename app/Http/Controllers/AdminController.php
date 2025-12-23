<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;





class AdminController extends Controller
{
    public function view_category(){
       $data= Category::all();
        return view('admin.category', compact('data'));
    }

   public function add_category(Request $request)
{
    $category = new Category;
    $category->category_name = $request->category;
    $category->save();

    flash()->success('Your category has been updated successfully.', [
        'title' => 'Category Updated'
    ]);

    return redirect()->back();
}

    


public function delete_category($id)
{
    $data = Category::find($id);

    if ($data) {
        $data->delete();

        flash()->success('Category deleted successfully.', [
            'title' => 'Deleted'
        ]);

    } else {
        flash()->error('Category not found.', [
            'title' => 'Error'
        ]);
    }

    return redirect()->back();
}



public function edit_category($id)
{
    $category = Category::find($id);

    if (!$category) {
        flash()->error('Category not found.', [
            'title' => 'Error'
        ]);

        return redirect()->back();
    }

    return view('admin.edit_category', compact('category'));
}




public function update_category(Request $request, $id)
{
    $category = Category::find($id);

    if (!$category) {
        flash()->error('Category not found.', [
            'title' => 'Error'
        ]);
        return redirect()->back();
    }

    $category->category_name = $request->category_name;
    $category->save();

    flash()->success('Category updated successfully.', [
        'title' => 'Updated'
    ]);

    return redirect()->route('view_category');
}


public function add_product(){
   $category = Category::all();
  return view('admin.add_product', compact('category'));
}


public function upload_product(Request $request)
{
    try {

        $data = new Product;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();

        // 🔥 Success Flash
        flash()->success('Product uploaded successfully.', [
            'title' => 'Success'
        ]);

        return redirect()->back();

    } catch (\Exception $e) {

        // ❌ Error flash
        flash()->error('Something went wrong while uploading the product.', [
            'title' => 'Error'
        ]);

        return redirect()->back();
    }
}



public function view_product(){

  $product= Product::paginate(5);

  return view('admin.view_product', compact('product'));
}

public function delete_product($id)
{
    $data = Product::find($id);

    if (!$data) {
        flash()->error('Product not found.', [
            'title' => 'Error'
        ]);
        return redirect()->route('view_product');
    }

    // Delete image if exists
    $image_path = public_path('products/' . $data->image);

    if (file_exists($image_path)) {
        unlink($image_path);
    }

    // Delete product
    $data->delete();

    flash()->success('Product deleted successfully.', [
        'title' => 'Deleted'
    ]);

    return redirect()->route('view_product');
}


public function edit_product($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();

    return view('admin.update_product', compact('product', 'categories'));
}

public function update_product(Request $request, $id)
{
    try {

        $product = Product::findOrFail($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        // Image upload
        if ($request->hasFile('image')) {
            $image = $request->image;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product', $imagename);
            $product->image = $imagename;
        }

        $product->save();

        // 🔥 Success flash
        flash()->success('Product updated successfully!', [
            'title' => 'Updated'
        ]);

        return redirect()->back();

    } catch (\Exception $e) {

        // ❌ Error flash
        flash()->error('Something went wrong while updating the product.', [
            'title' => 'Error'
        ]);

        return redirect()->back();
    }
}


public function product_search(Request $request){

$search = $request->search ;
$product= Product:: where('title', 'LIKE', '%'.$search. '%')
->orWhere('category', 'LIKE', '%'.$search. '%')->paginate(5);

return view('admin.view_product', compact('product'));
}

public function view_order(){

  $data= Order::paginate(5);
  $delivered = Order::where('status', 'Delivered')->count();
  return view('admin.view_order',compact('data', 'delivered'));
}

public function on_the_way($id)
{
    $data = Order::find($id);

    if (!$data) {
        flash()->error('Order not found.', [
            'title' => 'Error'
        ]);
        return redirect('/view_orders');
    }

    $data->status = 'On the way';
    $data->save();

    flash()->success('Order status updated to On the way.', [
        'title' => 'Updated'
    ]);

    return redirect('/view_orders');
}


public function delivered($id)
{
    try {

        $data = Order::findOrFail($id);

        $data->status = 'Delivered';
        $data->save();

        // 🔥 Success flash
        flash()->success('Order marked as Delivered.', [
            'title' => 'Delivered'
        ]);

        return redirect()->back();

    } catch (\Exception $e) {

        // ❌ Error flash
        flash()->error('Unable to mark order as delivered.', [
            'title' => 'Error'
        ]);

        return redirect()->back();
    }
}



public function print_pdf($id)
{
    
    $data = Order::find($id);

    if (!$data) {
        return redirect()->back()->with('error', 'Order not found');
    }

   
    $pdf = Pdf::loadView('admin.invoice', compact('data'));

 
    return $pdf->download('invoice_'.$data->id.'.pdf');
}



}
