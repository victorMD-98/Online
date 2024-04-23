<div class="bg-white w-75 mx-auto border border-white my-3" >
    <div class="w-100" >
        <form action="{{url('/profile/'.$user->id)}}" method="get" >
            <button type="submit" class=" d-flex p-2" ><img class="rounded-full fImg" src="{{Storage::url($user->image)}}" alt=""> <span class="mt-2 ms-2">{{ $user->name }}</span></button>
        </form>
    </div>
            @if($post->media->count()>1)
                <div id="carouselExample{{$key}}" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach($post->media as $ind=> $media)
                            <div class="carousel-item @if($ind === 0) active @endif ">
                                    <img class="followingPost" src="{{Storage::url($media->media)}}" alt="post-img">
                            </div>
                        @endforeach
                    </div>
                    
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample{{$key}}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample{{$key}}" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                </div>
            @else
                        <div>
                            <img class="followingPost" src="{{$post->media[0]->media}}" alt="">
                        </div> 
            @endif 
</div>