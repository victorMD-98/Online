<div>
    <ul class="list-group">
        @foreach ($followers as $follower)
            <li class="list-group-item flex">
                <form action="{{url('/profile/'.$follower->id)}}" method="get" >
                    <button type="submit" class=" d-flex p-2" ><img class="rounded-full fImg" src="{{Storage::url($follower->image)}}" alt=""> <span class="mt-2 ms-2">{{ $follower->name }}</span></button>
                </form>
                @if(Request::is('profile/'.$follower->id))
                  
                @elseif(Request::is('profile/auth'))
                    <button type="button" class="fbtn my-auto ms-auto">Remove</button>
                @endif 
            </li>
        @endforeach
    </ul>
</div>