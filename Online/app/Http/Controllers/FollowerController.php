<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Http\Requests\StoreFollowerRequest;
use App\Http\Requests\UpdateFollowerRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $user = User::with(['following.posts.media'])->find(Auth::user()->id);
        $followings = $user->following;
        //return $followings;
        return view('/dashboard',['followings'=>$followings]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFollowerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Follower $follower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Follower $follower)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFollowerRequest $request, Follower $follower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Follower $follower,int $id)
    {
        $follower = Follower::where('follower_user_id', Auth::user()->id)
        ->where('following_user_id', $id)
        ->first();

        if ($follower) {
        $follower->delete();
        }

        return redirect()->back();
    }

    public function follow(Follower $follower,int $id)
    {
        $data=[];
        $data[]=[
            'follower_user_id'=>Auth::user()->id,
            'following_user_id'=>$id,
        ];
        Follower::insert($data);
        return redirect()->back();
    }

    // public function remove(Follower $follower,int $id)
    // {
    //     $follower = Follower::where('follower_user_id', Auth::user()->id)
    //     ->where('following_user_id', $id)
    //     ->first();

    //     if ($follower) {
    //     $follower->delete();
    //     }

    //     return redirect()->back();
    // }
    
}
