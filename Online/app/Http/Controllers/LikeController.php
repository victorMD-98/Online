<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreLikeRequest $request)
    {
        $data= [];
        $data[]=[
            'post_id'=>$request->postID,
            'user_id'=>Auth::user()->id
        ];
        Like::insert($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLikeRequest $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        // $user_id = Auth::user()->id;

        // $like = Like::where('post_id', $like->id)
        //             ->where('user_id', $user_id)
        //             ->first();
        // $like->delete();
        // return redirect()->back();
        //return dd($like);
    }

    public function likeDestroy(int $id)
    {
        $user_id = Auth::user()->id;

        $like = Like::where('post_id', $id)
                    ->where('user_id', $user_id)
                    ->first();
        $like->delete();
        return redirect()->back();
        //return dd($like);
    }
}
