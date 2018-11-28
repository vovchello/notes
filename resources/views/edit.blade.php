@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-5 text-center">
        <h2>Editing Your Note</h2>
        <p class="lead"></p>
    </div>

    <div class="row">
        {{--<div class="col-md-4 order-md-2 mb-4">--}}
        {{--</div>--}}
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate>
               <div class="mb-3">
                    <label for="email">Title</label>
                    <input type="email" class="form-control" placeholder="{{$note->title}}">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Description</label>
                    <textarea type="text" class="form-control">{{$note->description}}</textarea>
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>


                <h4 class="mb-3">Delete at</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="credit">1 Day</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="debit">15 Days</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="paypal">Month</label>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>


</div>
@endsection