<div>
    <div style="text-align: left">
        <form wire:submit.prevent="post({{ $post->id }})">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            @csrf
            Post Something: <input wire:model.lazy="content" type="text">
            
            <div>
                <ul>
                    @foreach ($comments as $comment)
                        @if ($comment->post_id == $post->id)
                            <ul><a href="{{ route('profiles.show', [$comment->author_id]) }}"> {{ $comment->author }} </a>  - {{ $comment->content }}</ul>
                        @endif
                    @endforeach
                </ul> 
            </div>
            
         
            <button>Post Comment</button>
        </form>
    </div>
</div>
