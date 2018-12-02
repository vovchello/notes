@extends('layouts.app')

@section('content')
<div class="container">
    <div class="py-5 text-center">
        <h2>Editing Your Note</h2>
        <p class="lead"></p>
    </div>
    <div class="row">
        <div class="container">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" action="{{route('note.update',$note->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PUT')
               <div class="mb-3">
                    <label for="email">Title</label>
                    <input name="title" id="title" class="form-control" value="{{$note->title}}">
                </div>
                <div class="mb-3">
                    <label for="address">Description</label>
                    <textarea type="text" id="description" name="description" class="form-control">{{$note->description}}</textarea>
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
                <h4 class="mb-3">Add file</h4>
                <div class="fileform">
                    <input id="upload" type="file" name="upload"  />
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary  btn-block" type="submit">Submit</button>
            </form>
            <form action="{{route('note.destroy',$note->id)}}" type="inline" method="post">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="delete">
                <hr class="mb-4">
                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-block">Delete<i class="fa fa-times"></i></button>
            </form>
        </div>
    </div>
</div>
@endsection
