@extends('layouts.app')
@section('content')
    <a href="{{route('role.create')}}" class="ml-20 btn btn-info">Create role</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">users</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>
        @forelse($roles as $role)
            <tr>
                <th scope="row">{{$role->id}}</th>
                <td>{{$role->name}}</td>

                <td>
                    <a class="ml-20 btn btn-danger" href="{{route('role.affecter',$role->id)}}">affecter</a>
                </td>

                <td><a class="ml-20 btn btn-danger" href="{{route('role.edit',$role->id)}}">edit</a></td>
                <td>
                    <form class="delete" action="{{route('role.destroy',$role->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </td>
            </tr>
        @empty
            <p class="text-center font-weight-bold">no posts</p>
        @endforelse
        </tbody>
    </table>

@endsection
