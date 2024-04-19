
    <!-- Modal InfoPost -->
    <div class="modal fade " id="exampleModalPost{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
            <img class="rounded-full fImg" src="{{ $user[0]->image }}" alt=""> <span class="mt-2 ms-2">{{ $user[0]->name }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($post->media->count()>1)
                <!-- inizio carousel -->
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach($post->media as $media)
                            <div class="carousel-item active">
                                <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModalPost">
                                    <img class="postImg" src="{{$media->media}}" alt="post-img">
                                </button>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>                   
                </div>
                <!-- fine carousel -->
                @else
                    <img src="{{$post->media[0]->media}}" alt="">
                @endif
                
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
