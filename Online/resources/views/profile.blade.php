<?php
    //print_r($followings);
    // print_r($UserPosts)
?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jersey+10&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="resources/css/prova.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite('resources/css/prova.css')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white ">

            <header>
            @include('layouts.navigation')
                <div class="container text-white my-10 border-bottom border-light" >
                    <div class="relative" >
                        <img class="backImg" src='{{$user[0]->background_img}}' alt="back-img">
                        <div class="absolute top-44 left-2" >
                            <div class="position-relative divv rounded-full">
                           
                                <img class="rounded-full profileImg" src='{{$user[0]->image}}' alt="profile-img">
                                <div class=" d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle label">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <label for="my-file-input"><img class="imgp" src="https://st2.depositphotos.com/2498595/5736/v/450/depositphotos_57364439-stock-illustration-photo-camera-icon.jpg" alt=""></label>
                                        <input type="file" id="my-file-input" name="image" class="inpFile" >
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-20 flex mb-5" >
                            <p class="ns ms-4 me-5" >{{$user[0]->name}} {{$user[0]->surname}}</p>
                            <p class="ns mx-5"><span class="font-black" >{{$UserPosts->count()}}</span> posts</p>
                            <p class="ns mx-5"> 
                                <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModalFollowers">
                                    <span class="font-black">{{$followers->count()}}</span>  followers
                                </button>
                            </p>
                            <p class="ns mx-5"> 
                                <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModalFollowing">
                                    <span class="font-black">{{$followings->count()}}</span> following
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </header>
            <main>
                <div class="container flex" >
                    @foreach($UserPosts as $key => $post)
                        <x-post :post="$post" :key="$key" />
                        <x-modal-post :post="$post" :user="$user" :key="$key" />
                    @endforeach
                </div>
            </main>
             <!-- Modal following -->
             <div class="modal fade " id="exampleModalFollowers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Followers</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <x-follower :followers="$followers" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                </div>
                <!-- Modal following -->
                <div class="modal fade " id="exampleModalFollowing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Following</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <x-following :followings="$followings" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                </div>
        </div>
    </body>
</html>


