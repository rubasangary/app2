<div>
    @if ($post->isLikedByUser())
        <button class="outline-none focus:outline-none" wire:click="unlike">
            <i class="fa-solid fa-thumbs-up fa-xl" style="color: #055df5;"></i>
        </button>
    @else
        <button class="outline-none focus:outline-none" wire:click="like">
            <i class="fa-regular fa-thumbs-up fa-xl" style="color: #005cfa;"></i>
        </button>
    @endif
    <span class="p-2 text-gray-800 dark:text-gray-300">{{ $post->likesCount() }}</span>
    <span>Likes</span>
</div>
