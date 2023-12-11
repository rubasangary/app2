<div>

    @if ($forum->isLikedByUser())
        <button wire:click="unlike">Unlike</button>
    @else
        <button wire:click="like">Like</button>
    @endif
    <span>{{ $forum->likesCount() }} Likes</span>

</div>
