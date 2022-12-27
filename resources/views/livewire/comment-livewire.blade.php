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

            <button>Post Comment</button>

            <div>
                <ul>
                    @foreach ($comments as $comment)
                        @if ($comment->post_id == $post->id)
                            <ul><a href="{{ route('profiles.show', [$comment->author_id]) }}"> {{ $comment->author }} </a>  - {{ $comment->content }}
                                @if($comment->author_id == $id_user or $user_role == 'admin')
                                    <form method="POST"
                                        action="{{ route('comments.destroy', [$post->id, $comment->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="Submit">Delete Comment</button>
                                    </form>

                                    <a href="{{ route('comments.edit', [$post->id, $comment->id]) }}" class="btn btn-primary">Edit</a></p>
                                
                                @endif
                            </ul>
                        @endif
                    @endforeach
                </ul> 
            </div>
        </form>
    </div>
</div>
