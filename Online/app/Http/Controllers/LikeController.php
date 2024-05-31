<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
       
         // Logga i dati della richiesta per il debug
         Log::info('Dati della richiesta: ', $request->all());

         // Logga il token CSRF per verificare se è corretto
         Log::info('Token CSRF: ', ['csrf_token' => $request->header('X-CSRF-TOKEN')]);
 
         // Valida i dati della richiesta
         $validated = $request->validate([
             'post_id' => 'required|integer',
             'user_id' => 'required|integer',
         ]);
 
         try {
             // Creazione del like
             Like::create([
                 'post_id' => $validated['post_id'],
                 'user_id' => $validated['user_id'],
             ]);
 
             return response()->json(['message' => 'Like aggiunto con successo'], 200);
         } catch (\Exception $e) {
             // Logga l'errore per il debug
             Log::error('Errore: ', ['error' => $e->getMessage()]);
             return response()->json(['error' => 'Errore interno del server'], 500);
         }

        
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
