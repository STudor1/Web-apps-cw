<div>
    <div style="text-align: center">
        <form wire:submit.prevent="post({{ $post->id }})">
            @csrf
            <input wire:model="content" type="text">
 
        
         
            <button>Post Comment</button>
        </form>
    </div>
</div>
