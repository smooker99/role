@extends('layouts.app')
@section('content')
    <form method="POST" action="{{route('role.create')}}">
        @csrf
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">Name</label>
                <input type="text" class="form-control mb-2" name="name" id="inlineFormInput" placeholder="Post name">
            </div>
            @foreach($permissions as $perm)
            <div class="form-check">
                <input class="form-check-input" name="name_p[]" type="checkbox" value="{{$perm->name}}" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    {{$perm->name}}
                </label>
            </div>
            @endforeach
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </div>
        </div>
    </form>
@endsection
