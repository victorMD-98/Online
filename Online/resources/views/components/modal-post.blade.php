
    <!-- Modal InfoPost -->
<div>
    <div class="modal fade " id="exampleModalPost{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <img class="rounded-full fImg" src="{{Storage::url($user->image)}}" alt=""> <span class="mt-2 ms-2">{{ $user->name }}</span>
                @if(Request::is('profile/'.$user->id))
                  
                @elseif(Request::is('profile/auth'))
                    <form class="ms-auto" action="{{url('post/'.$post->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="fs-3 ms-auto" ><i class="bi bi-trash3-fill"></i></button>
                    </form>
                @endif 
                    
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
                            <img class="modalImg" src="{{Storage::url($post->media[0]->media)}}" alt="post-img">
                        </div> 
                    @endif
                    <input type="number" value='{{$post->id}}' hidden name="postID" id="postID{{$key}}">
                    <input type="number" value='{{Auth::user()->id}}' hidden name="userID" id="userID{{$key}}">
                    @if($post->likes->contains('user_id',Auth::user()->id))
                        <form action="{{'/likeDelete/'.$post->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button id="cuore" type="submit" ><i class="bi bi-suit-heart-fill fs-3"></i></i></button> {{$post->likes->count()}}
                        </form>
                    @else
                        <form action="/like" method="post">
                            @csrf
                            
                            <button type="submit" ><i class="bi bi-suit-heart fs-3"></i></button> {{$post->likes->count()}}
                        </form>
                    @endif                   
                <div>
                    @foreach($post->comments as $comment)
                        <div>
                            
                        </div>
                    @endforeach
                    
                </div>
                <div>
                    <button onclick="prova{{$key}}()" type="button" class="btn btn-dark">Dark</button>
                </div>
                <div>
                <h1>{{$key}}</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function prova{{$key}} (){
        let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        let like = {
            post_id : document.querySelector("#postID{{$key}}").value,
            user_id : document.querySelector("#userID{{$key}}").value
        }
        console.log(like)  
        fetch("http://127.0.0.1:8000/like",{
            method: "Post",
            body:JSON.stringify(like),
            headers:{"Content-Type" : 'application/json',
                    "X-CSRF-TOKEN": csrfToken
            }
        }).then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok ' + response.statusText);
                }
                return response.json();
            }).then(data => {
                console.log(data);
            }).catch(error => {
                console.error('There has been a problem with your fetch operation:', error);
            });
    }

</script>
