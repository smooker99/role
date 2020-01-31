@extends('layouts.app')
@section('content')
    <form method="POST" action="{{route('post.create')}}">
        @csrf
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input type="text" class="form-control mb-2" name="name" id="inlineFormInput" placeholder="Post name">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </div>
        </div>
    </form>
@endsection
