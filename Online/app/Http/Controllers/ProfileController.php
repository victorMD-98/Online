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
        //$userAuth = User::where('id',Auth::user()->id)->get() ;
        $userAuth = Auth::user() ;
        $UserPosts= Post::where('user_id',Auth::user()->id)->with('media')->get();
        // Ottenere i seguaci di un utente
        $user = User::find(Auth::user()->id);
        $followings = $user->following;
        $followers = $user->followers;
        return view('profile',['user'=>$userAuth,'UserPosts'=>$UserPosts,'followers'=>$followers,'followings'=>$followings]);
        //return $userAuth;
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
        $userImg=User::findOrFail($id);
        if($request->has('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            if (Storage::exists($userImg->image!="default/avatar.png")) {
                Storage::delete($userImg->image);
            }
            $file->storeAS('public/profile_img',$filename);
            $userImg->update(['image'=>'profile_img/'.$filename]);
        }elseif($request->has('imageBack')){
            $file = $request->file('imageBack');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            if (Storage::exists($userImg->background_img!="default/sfondo.jpg")) {
                Storage::delete($userImg->background_img);
            }
            $file->storeAS('public/back_img',$filename);
            $userImg->update(['background_img'=>'back_img/'.$filename]);
        }
        


        
       return redirect()->back()->with('status','image updated');
    }
}
