<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;
use Validator;
use App\Http\Requests\UserEditRequest;

class UsersController extends Controller
{
    //

    public function profile(){
        $user=Auth::user();
        return view('users.profile',['user'=>$user]);
    }

    public function profileEdit(UserEditRequest $request,User $user){

        if($request->password && $request->user()->password != $request->password){
            $request->password = bcrypt($request->password);
            // 入力されたパスワードと元のパスワードが異なる場合
        }else{
            $request->password = $request->user()->password;
            // 同じ場合
        }

            // 画像ファイルの入力有無で条件分け
        if($request->icon_image){
            $image=$request->file('icon_image');
            $path=$image->store('public/images');
            $filepath=str_replace('public/images','',$path);

            \DB::table('users')
             ->where('id',$request->id)
             ->update([
                'username'=>$request->username,
                'mail'=>$request->mail,
                'password'=>$request->password,
                'bio'=>$request->bio,
                'images'=>$filepath
                ]);
            }else{
                \DB::table('users')
             ->where('id',$request->id)
             ->update([
                'username'=>$request->username,
                'mail'=>$request->mail,
                'password'=>$request->password,
                'bio'=>$request->bio,
             ]);
            }
        return redirect('/top');
    }

    public function search(Request $request){
        if($request->search){
            $keyword=$request->search;
            $users=User::where('username','LIKE',"%{$keyword}%")->where('id','!=',Auth::user()->id)->orderBy('users.created_at','desc')->get();
            return view('users.search',['users'=>$users,'keyword'=>$keyword]);
        }else{
            $users = User::where('id','!=',Auth::user()->id)->get();
            return view('users.search',['users'=>$users]);
        }
    }

    public function follow(User $user){
        $follower=auth()->user();
        // フォローしているか
        $is_following=$follower->isFollowing($user->id);
        if(!$is_following){
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    public function unfollow(User $user){
        $follower=auth()->user();
        // フォローしているか
        $is_following=$follower->isFollowing($user->id);
        if($is_following){
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }

    public function userProfile($id){
        $user=User::where('id',$id)
              ->get();

        $timelines=Post::where('user_id',$id)
                   ->latest()->get();
        return view('users.userProfile',['user'=>$user,'timelines'=>$timelines]);
    }
}
