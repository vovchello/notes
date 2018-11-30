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
        <div class="container">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" action="{{route('note.store')}}" method="post">
                {{csrf_field()}}
                {{--@method('PUT')--}}
               <div class="mb-3">
                    <label for="email">Title</label>
                    <input name="title" id="title" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="address">Description</label>
                    <textarea type="text" id="description" name="description" class="form-control"></textarea>
                </div>


                <h4 class="mb-3">Delete at</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="1day" name="deleteAt" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="1day">1 Day</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="15days" name="deleteAt" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="15days" id="1">15 Days</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="month" name="deleteAt" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="month">Month</label>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
            </form>
        </div>
    </div>


</div>
@endsection
