<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Follower;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index (){
        $userAuth = Auth::user() ;
        $UserPosts= Post::where('user_id',Auth::user()->id)->with('media')->with('comments')->with('likes')->get();
        $user = User::find(Auth::user()->id);
        $followings = $user->following;
        $followers = $user->followers;
        return view('profile',['user'=>$userAuth,'UserPosts'=>$UserPosts,'followers'=>$followers,'followings'=>$followings]);
        //return $UserPosts;
    }

    public function profile(int $id){
        $userAuth = User::find(Auth::user()->id);
        $followingsAuth = $userAuth->following;
        $followersAuth = $userAuth->followers;
        $user = User::with(['posts.media'])->find($id);
        $userID=User::find($id);
        $followings = $userID->following;
        $followers = $userID->followers;
        return view('userProfile',['user'=>$user,'followers'=>$followers,'followings'=>$followings,'followingsAuth'=>$followingsAuth,'followersAuth'=>$followersAuth]);
        //return $followingsAuth;
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function updateProfImg (Request $request, int $id){

        $request->validate([
            'image'=> 'image|mimes:jpeg,png,jpg',
            'imageBack'=> 'image|mimes:jpeg,png,jpg'
        ]);

        $userImg=User::findOrFail($id);
        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            if (Storage::disk('public')->exists($userImg->image) && $userImg->image != 'default/avatar.png') {
                Storage::disk('public')->delete($userImg->image);
            }
            $file->storeAS('public/profile_img',$filename);
            $userImg->update(['image'=>'profile_img/'.$filename]);
        }
        
        if($request->has('imageBack')){
            $file = $request->file('imageBack');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            if (Storage::disk('public')->exists($userImg->background_img) && $userImg->background_img != 'default/sfondo.jpg') {
                Storage::disk('public')->delete($userImg->background_img);
            }
            $file->storeAS('public/back_img',$filename);
            $userImg->update(['background_img'=>'back_img/'.$filename]);
        }
        
       return redirect()->back()->with('status','image updated');
    }
}
