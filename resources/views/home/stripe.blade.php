@extends('layouts.app')

@section('title', 'Stripe Payment')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Laravel Giftshop – Stripe Payment</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="panel panel-default">
                
                <div class="panel-heading text-center">
                    <h3 class="panel-title">Payment Details</h3>
                </div>

                <div class="panel-body">

                    {{-- Success Message --}}
                    @if(session()->has('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form id="payment-form" method="POST" action="">
                        @csrf

                        {{-- Card Holder Name --}}
                        <div class="form-group">
                            <label>Name on Card</label>
                            <input type="text" class="form-control" id="cardholder-name"
                                   placeholder="Enter card holder name">
                        </div>

                        {{-- Card Element --}}
                        <div class="form-group mt-3">
                            <label>Card Details</label>
                            <div id="card-element" class="stripe-input"></div>
                            <span id="card-errors" class="text-danger mt-2 d-block"></span>
                        </div>

                        {{-- Pay Button --}}
                        <button class="btn btn-primary btn-block btn-lg mt-4" id="card-button"
                                data-secret="{{ $intent->client_secret ?? '' }}">
                            Pay Now ($100)
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .stripe-input {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background: #fff;
    }
</style>
@endsection

@section('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();
    const card = elements.create('card');

    card.mount('#card-element');

    card.on('change', function(event) {
        document.getElementById('card-errors').textContent =
            event.error ? event.error.message : '';
    });

    const form = document.getElementById('payment-form');

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const { token, error } = await stripe.createToken(card);

        if (error) {
            document.getElementById('card-errors').textContent = error.message;
            return;
        }

        let hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'stripeToken';
        hiddenInput.value = token.id;

        form.appendChild(hiddenInput);
        form.submit();
    });
</script>
@endsection



