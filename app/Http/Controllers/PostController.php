<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){

        $posts=Post::all();
        return view('post.index',compact('posts'));
    }

    public function create(){
        return view('post.create');
    }
    public function store(){

        auth()->user()->posts()->create($this->validateRequest());
        return  redirect('/post');

    }
    public function edit(Post $post){
        $user=auth()->user();
        if(!$user->hasPermissionTo('edit post')){
            abort(403);
        }
        $users = User::permission('edit post')->get();
       foreach ($users as $user){
           if (auth()->user()->id!=$user->id) {
               abort(403);
           }
       }


        return view('post.edit',compact('post'));
    }
    public function update(Post $post){

        $post->update($this->validateRequest());
        return  redirect('/post');

    }
    public function destroy(Post $post){
        $post->delete();
        return  redirect('/post');
    }

    /**
     * @return array
     */
    public function validateRequest()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
