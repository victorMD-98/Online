
    <!-- Modal InfoPost -->
<div>
    <div class="modal fade " id="exampleModalPost{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="rounded-full fImg" src="{{Storage::url($user->image)}}" alt=""> <span class="mt-2 ms-2">{{ $user->name }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                @if($post->media->count()>1)
                <div id="carouselExample{{$key}}" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach($post->media as $ind=> $media)
                            <div class="carousel-item @if($ind === 0) active @endif ">
                                    <img class="modalImg" src="{{Storage::url($media->media)}}" alt="post-img">
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
                            <img class="modalImg" src="{{$post->media[0]->media}}" alt="">
                        </div> 
                    @endif                   
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
