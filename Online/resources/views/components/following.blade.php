<div>
    <ul class="list-group">
        @foreach ($followings as $following)
            <li class="list-group-item flex">
                <form action="{{url('/profile/'.$following->id)}}" method="get" >
                    <button type="submit" class=" d-flex p-2" ><img class="rounded-full fImg" src="{{Storage::url($following->image)}}" alt=""> <span class="mt-2 ms-2">{{ $following->name }}</span></button>
                </form>
                <button type="button" class="fbtn my-auto ms-auto">Following</button>
            </li>
        @endforeach
    </ul>
</div>