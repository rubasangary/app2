@extends('frontend.components.layouts')

@section('content')



 <div class="mt-20 mx-auto ">
    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-4 gap-10">


                    @foreach ($randImage as $image)

                        <div x-data="gallery()" class="relative">
                            <div class="grid-rows-5">
                                <a x-on:click.prevent="open" class="block relative bg-red-100 h-36 w-64" href="{{ asset('/storage/pictures/' . $image->image )}}">
                                    <img class="absolute inset-0 w-full h-full object-cover object-center" src="{{ asset('/storage/pictures/' . $image->image )}}">
                                </a>
                            </div>

                            <div style="display: none" x-show="isOpen()" x-transition:enter="transition ease-in-out duration-400" x-transition:enter-start="opacity-0" x-transition:leave="transition ease-in-in duration-400" x-transition:leave-end="opacity-0" x-on:click="close" x-on:keydown.window.escape="close" class="fixed inset-0 bg-opacity-90 flex justify-center items-center z-50">
                                <img x-show="isOpen()" x-transition:enter="transition ease-in-out duration-400" x-transition:enter-start="opacity-0 transform scale-50" x-transition:leave="transition ease-in-in duration-400" x-transition:leave-end="opacity-0 transform scale-50" class="w-4/5 h-4/5 object-contain object-center mt-20" x-bind:src="activeImageUrl" alt="">
                            </div>
                        </div>

                    @endforeach

    </div>
</div>


<script>
function gallery() {
    return {
        show: false,
        activeImageUrl: null,

        isOpen() {
            return this.show
        },

        open($event) {
            this.activeImageUrl = $event.target.parentNode.href
            this.show = true
        },

        close() {
            this.show = false
            // Clear the active image URL after the image closed
            setTimeout(() => this.activeImageUrl = null, 300)
        }
    }
}
</script>


@endsection


