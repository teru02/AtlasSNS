<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Validator;

class PostsController extends Controller
{
    //
    public function index(){
        $posts =Post::query()->whereIn('user_id',Auth::user()->follows()->pluck('followed_id'))
        ->orWhere('user_id',Auth::user()->id)
        ->latest()
        ->get();
        $login_user_id=Auth::id();

        return view('posts.index',['post'=>$posts,'login_user_id'=>$login_user_id]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'post' => 'required|max:200']
        );
    if($validator->fails()){
        return redirect('/top')
        ->withInput()
        ->withErrors($validator);
    }

    $posts = new Post;
    $posts->post = $request->post;
    $posts->user_id = Auth::id();
    $posts->save();
        // $postsはインスタンス
        // $postsはpostというプロパティを持つ($requestのpost)
        // $postsはuser_idというプロパティを持つ

        return redirect('/top');
    }

    public function delete($id){
        \DB::table('posts')
             ->where('id',$id)
             ->delete();

             return redirect('/top');
    }

    // 編集edit★
    public function edit(Request $request){
         \DB::table('posts')
             ->where('id',$request->id)
             ->update(['post'=>$request->post]);
             return redirect('/top');
    }


}
