<x-app-layout>
   
@foreach($followings as $user)
    @foreach($user->posts as $key=>$post)
        <x-folowingPost :key="$key" :post="$post" :user="$user" />
    @endforeach
@endforeach
</x-app-layout>
