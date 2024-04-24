<div class="bg-white w-75 mx-auto border border-white my-3" >
    <div class="w-100" >
        <form action="{{url('/profile/'.$user->id)}}" method="get" >
            <button type="submit" class=" d-flex p-2" ><img class="rounded-full fImg" src="{{Storage::url($user->image)}}" alt=""> <span class="mt-2 ms-2">{{ $user->name }}</span></button>
        </form>
    </div>
            @if($post->media->count()>1)
                <div id="carouselExample{{$key.$user->surname}}" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach($post->media as $ind=> $media)
                            <div class="carousel-item @if($ind === 0) active @endif ">
                                    <img class="followingPost" src="{{Storage::url($media->media)}}" alt="post-img">
                            </div>
                        @endforeach
                    </div>
                    
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample{{$key.$user->surname}}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample{{$key.$user->surname}}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                </div>
            @else
                        <div>
                            <img class="followingPost" src="{{$post->media[0]->media}}" alt="">
                        </div> 
            @endif 
            <div class="ms-2" >
                @if($post->likes->contains('user_id',Auth::user()->id))
                            <form action="{{'/likeDelete/'.$post->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" ><i class="bi bi-suit-heart-fill fs-3"></i></i></button> {{$post->likes->count()}}
                            </form>
                @else
                            <form action="/like" method="post">
                                @csrf
                                <input type="number" value='{{$post->id}}' hidden name="postID" id="">
                                <button type="submit" ><i class="bi bi-suit-heart fs-3"></i></button> {{$post->likes->count()}}
                            </form>
                @endif 
            </div>      
</div>