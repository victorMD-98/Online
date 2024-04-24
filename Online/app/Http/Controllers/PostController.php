<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {   
        $request->validate([
            'images.*'=> 'required|image|mimes:jpeg,png,jpg'
        ]);
        $data=[];
        $data['user_id']=Auth::user()->id;
        $data['created_at']=Carbon::now();
        $post=Post::create($data);   
        $media=[];
        if($files=$request->file('images')){
            foreach($files as $file){
                $extension = $file->getClientOriginalExtension();
                $filename =Str::uuid() . '.' . $extension;
                $file->storeAs('public/post_images',$filename);
                $media[]=[
                    'post_id'=>$post->id,
                    'media'=>'post_images/'.$filename
                ];
                
            }
        }
        Media::insert($media);
        return redirect('profile/auth');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        
        $post = Post::findOrFail($post->id);
    
        foreach ($post->media as $media) {
        if(Storage::disk('public')->exists($media->media))
        {Storage::disk('public')->delete($media->media);}
    }
        $post->delete();
        return redirect()->back();
    }
}
