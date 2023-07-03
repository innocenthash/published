@extends('layouts.app_annoceurs')
@section('title')
Plans
@endsection

@section('subscription')
<div class="container">
    <form id="payment-form" action="{{ route('subscription.create') }}" method="POST">
    <div class="row bg-gradient-to-r">

        <div class="col-12 col-md-6 mx-auto my-auto h-screen">
            <div class="card shadow-md hover:shadow-2xl hover:shadow-white mt-10">
                <div class="card-header text-center bg-gradient-to-r from-pink-500 to-yellow-500  text-white">
                    Vous serez facturé ${{ number_format($plan->price, 2) }} pour {{ $plan->name }} Plan
                </div>

                <div class="card-body  text-white ">

                    <input type="hidden" name="pay_id_annonce" value="{{$id->id}}">
                        @csrf
                        <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">

                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-4">
                                <div class="form-group">
                                    <label for="card-holder-name text-black">Name</label>
                                    <input type="text" name="name" id="card-holder-name" class="form-control  rounded-md focus:ring-slate-300 focus:ring-0 ring-hidden border-black" value="" placeholder="Name on the card">
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center ">
                            <div class="col-xl-4 col-lg-4">
                                <div class="form-group">
                                    <label for="">Card details</label>
                                    <div id="card-element"></div>
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-center ">
                            <div class="col-xl-4 col-lg-4">
                                <hr>
                                    <button type="submit" class="btn shadow-2xl bg-gradient-to-r from-pink-500 to-yellow-500 text-white btn-block" id="card-button" data-secret="{{ $intent->client_secret }}">Pay</button>
                                </div>
                        </div>


                </div>


            </div>
        </div>

        {{-- <div class="col-md-6">
            <div class="card w-50">
                <div class="card-header">Offres :</div>
                <div class="card-body">

                <p>Vous allez effectuer un payment  pour le publicité :  <strong>{{$id->offres}}</strong></p>


                </div>
                <div class="card-footer">Footer</div> --}}
              {{-- </div>
        </div> --}}


    </div>
</form>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}')

    const elements = stripe.elements()
    const cardElement = elements.create('card')

    cardElement.mount('#card-element')

    const form = document.getElementById('payment-form')
    const cardBtn = document.getElementById('card-button')
    const cardHolderName = document.getElementById('card-holder-name')

    form.addEventListener('submit', async (e) => {
        e.preventDefault()

        cardBtn.disabled = true
        const { setupIntent, error } = await stripe.confirmCardSetup(
            cardBtn.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        )

        if(error) {
            cardBtn.disable = false
        } else {
            let token = document.createElement('input')
            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)
            form.appendChild(token)
            form.submit();
        }
    })
</script>
@endsection
