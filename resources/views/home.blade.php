@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="box-body">
                    @include('layouts.errors-and-messages')
                </div>
                @foreach($notes as $note)
                    <div class="out" style="margin: 10px">
                    <div class="card-header">
                        Title: <h4>{{$note->title}}</h4>
                    </div>
                    <div class="card-body">
                        {{$note->description}}
                    </div>
                    <div class="card-header">
                        <div class="btn-group">
                            <form action="{{route('note.edit',$note->id)}}" method = "get" type="inline">
                                {{csrf_field()}}
                                <button type="button " class="btn btn-info btn-sm">Edit</button>
                            </form>
                            <form action="{{route('note.destroy',$note->id)}}" type="inline" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="delete">
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete<i class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
