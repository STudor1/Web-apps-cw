<div>
    <div style="text-align: left">
        {{--ok i think the problem is i'm only passing comments once, when i refresh the page
        i need to have a copy or something of them in livewire always so i can read them?--}}
        <form wire:submit.prevent="post({{ $post->id }}, {{$comments}})">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>

            @csrf
            Post Something: <input wire:model="content" type="text">
            {{-- 
            <ul>
                @foreach ($comments as $comment)
                    @if ($comment->post_id == $post->id)
                        <ul><a href="{{ route('profiles.show', [$comment->author_id]) }}"> {{ $comment->author }} </a>  - {{ $comment->content }}</ul>
                    @endif
                @endforeach
            </ul> 
            --}}
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
