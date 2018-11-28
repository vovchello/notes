@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($notes as $note)
                    <div class="card-header">
                        Title: <h4>{{$note->title}}</h4>
                    </div>
                    <div class="card-body">
                        {{$note->description}}
                    </div>
                    <div class="card-header">
                        {{$note->user->name}}
                        {{--<a href="/note">Edit</a>--}}
                        <form action="/note">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{ $note->id }}">
                            <button type="button " class="btn btn-danger btn-sm">Edit</button>
                        </form>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
