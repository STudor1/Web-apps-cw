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
            Post Something: <input wire:model="content" type="text">

            <p>{{ $content }}</p>
        
         
            <button>Post Comment</button>
        </form>
    </div>
</div>
