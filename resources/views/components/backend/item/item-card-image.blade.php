<div class="relative">
    <x-app-partials.image
        src="{{ (isset($item->firstImage->url) && $item->firstImage->url) ? asset('storage/'.$item->firstImage->url) : asset('images/200x200.png')  }}"
        :alt="$item->title"
        :title="$item->title"/>
    <div class="absolute top-2 right-4  ">
        <div class="badge  mt-2 bg-success/15 text-success dark:bg-info/15">
            FOR {{ Str::upper($item->target ) }}
        </div>
    </div>
    <div class="absolute top-0 left-0 w-full h-full bg-gray-800 opacity-70"></div>
    <div class="absolute top-2 right-4  ">
        <div class="badge  mt-2 bg-success/15 text-success dark:bg-info/15">
            FOR {{ Str::upper($item->target ) }}
        </div>
    </div>
</div>
