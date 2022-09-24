<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $timelines=Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->get();

        $following_ids=User::query()->whereIn('id',Auth::user()->follows()->pluck('followed_id'))->latest()->get();

        return view('follows.followList',['timelines'=>$timelines,'following_ids'=>$following_ids]);
    }

    public function followerList(){
        $timelines=Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('following_id'))->latest()->get();

        $follower_ids=User::query()->wherein('id',Auth::user()->followers()->pluck('following_id'))->latest()->get();
        return view('follows.followerList',['timelines'=>$timelines,'follower_ids'=>$follower_ids]);
    }
}
