<!DOCTYPE html>
<html>
<head>
    <title>Laravel Giftshop Ecommerce Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: white;
            box-shadow: inset 0 1px 1px rgba(0,0,0,0.075);
            transition: box-shadow 150ms ease;
        }
        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Laravel Giftshop Ecommerce Project</h1>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading">
                    <h3 class="panel-title">Payment Details</h3>
                
                </div>
                <div class="panel-body">

                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <form id="payment-form">
                        @csrf
                        <div class="form-row">
                            <label for="cardholder-name">Name on Card</label>
                            <input id="cardholder-name" class="form-control" type="text" placeholder="Name on card">
                        </div>
                        <div class="form-row" style="margin-top:15px;">
                            <label>Card Details</label>
                            <div id="card-element" class="StripeElement"></div>
                            <div id="card-errors" class="error" role="alert"></div>
                        </div>
                        <button id="card-button" class="btn btn-primary btn-lg btn-block" style="margin-top:20px;"
                                data-secret="{{ $intent->client_secret ?? '' }}">
                            Pay Now ($100)
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ env('STRIPE_KEY') }}"); // আপনার publishable key
    const elements = stripe.elements();

    const card = elements.create('card');
    card.mount('#card-element');

    card.addEventListener('change', function(event) {
        const displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const { token, error } = await stripe.createToken(card);

        if (error) {
            const errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            // Token কে Laravel backend এ পাঠানো
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            form.submit();
        }
    });
</script>

</body>
</html>


