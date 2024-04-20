<div>
    <ul class="list-group">
        @foreach ($followers as $follower)
            <li class="list-group-item flex"> <img class="rounded-full fImg" src="{{Storage::url($follower->image)}}" alt=""> <span class="mt-2 ms-2">{{ $follower->name }}</span> <button type="button" class="fbtn mt-1 ms-auto">Remove</button> </li>
        @endforeach
    </ul>
</div>