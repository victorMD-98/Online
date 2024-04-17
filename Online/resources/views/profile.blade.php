<?php
    //var_dump($user);
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
  
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white ">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                <div class="container text-white my-10" >
                    <div class="relative" >
                        <img class="backImg" src='{{$user[0]->background_img}}' alt="back-img">
                        <div class="absolute top-44 left-2" >
                            <div>
                                <img class="rounded-full profileImg" src='{{$user[0]->image}}' alt="profile-img">
                            </div>
                        </div>
                        <div class="mt-20 flex" >
                            <p class="ns ms-4 me-5" >{{$user[0]->name}} {{$user[0]->surname}}</p>
                            <p class="ns mx-5"> <span class="font-black" >{{$UserPosts->count()}}</span> posts</p>
                            <p class="ns mx-5"> <span class="font-black">{{$followers->count()}}</span>  followers</p>
                            <p class="ns mx-5"> <span class="font-black">{{$followings->count()}}</span> following</p>
                        </div>
                        
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>


