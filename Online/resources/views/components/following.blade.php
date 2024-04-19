<div>
    <ul class="list-group">
        @foreach ($followings as $following)
            <li class="list-group-item flex"> <img class="rounded-full fImg" src="{{ $following->image }}" alt=""> <span class="mt-2 ms-2">{{ $following->name }}</span> <button type="button" class="fbtn mt-1 ms-auto">Following</button> </li>
        @endforeach
    </ul>
</div>