@extends('layouts.app')
@section('content')
    <form method="POST" action="{{route('role.affecter.store',$role->id)}}">
        @csrf
        <div class="form-row align-items-center">
            <p>{{$role->name}}</p>
            <div class="form-group">
                <label for="exampleFormControlSelect1">select user</label>
                <select name="user" class="form-control" id="exampleFormControlSelect1">
                    @foreach($user as $user)
                        <option>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </div>
        </div>
    </form>
@endsection
