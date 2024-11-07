<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        @if ($search)
        <h3>Searching "{{$search}}"</h3>
        @endif
        <div  class="flex items-center space-x-4 font-light ">
            <button class="{{$sort==='desc'?"text-gray-900 py-4 border-b border-gray-700":"text-gray-500"}}  py-4" wire:click = setSort('desc')>Latest</button>
            <button class="{{$sort==='asc'?"text-gray-900 py-4 border-b border-gray-700":"text-gray-500"}}  py-4" wire:click = setSort('asc')>Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->articles as $article)
            <x-articles.article :article="$article" />
        @endforeach

    </div>
    <div class="my-3">
        {{ $this->articles->onEachSide(1)->links() }}
    </div>
</div>
