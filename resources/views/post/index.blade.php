@extends('layouts.app')
@section('content')
    <a href="{{route('post.create')}}" class="ml-20 btn btn-info">Create post</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">user</th>
                <th scope="col">edit</th>
                <th scope="col">delete</th>
            </tr>
            </thead>
            <tbody>
            @forelse($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->name}}</td>
                <td>{{$post->user->name}}</td>
                <td><a class="ml-20 btn btn-danger" href="{{route('post.edit',$post->id)}}">edit</a></td>
                <td>
                        <form class="delete" action="{{route('post.destroy',$post->id)}}" method="POST">
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
