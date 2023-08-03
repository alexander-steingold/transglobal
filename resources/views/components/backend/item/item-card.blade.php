<x-app-partials.card {{ $attributes->merge(['class' => 'text-slate-600']) }}>
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/3">
            <div class="flex h-full items-center">
                <x-item.item-card-image :item="$item"/>
            </div>
        </div>
        <div class="w-full md:w-2/3 pl-4">
            <h3 class="font-medium text-lg ">
                {{ Str::limit($item->title, 25, '...')  }}
            </h3>
            <x-app-partials.divider/>
            <div class=" flex items-baseline ">
                <i class="uil uil-map-marker text-1xl me-1 text-green-600"></i>
                <div class="">
                    {{ $item->city }}, {{ $item->address }}
                </div>
            </div>
            {{--            <x-app-partials.divider/>--}}
            {{--            <p class="text-xs">--}}
            {{--                {{ Str::limit($product->description, 180, '...')  }}--}}
            {{--            </p>--}}
            <x-app-partials.divider/>
            <div class=" flex items-baseline ">
                <x-app-partials.icon class="uil-bed-double"/>
                <div>
                    {{$item->bedrooms}}  {{Str::plural('Bed',$item->bedrooms)}}
                </div>
                <x-app-partials.icon class="uil-bath ms-4"/>
                <div>
                    {{ $item->bathrooms }} {{Str::plural('Bath',$item->bathrooms)}}
                </div>
                <x-app-partials.icon class="uil-compress-arrows ms-4"/>
                <div>
                    {{ $item->area }} Sqm
                </div>
            </div>
            <x-app-partials.divider/>
            <div class=" flex justify-between items-center">
                <div class="text-xl">
                    ${{ number_format($item->price) }}
                </div>
                <div class="text-success">
                    {{ Str::upper($item->type) }}
                </div>
            </div>
        </div>
    </div>
</x-app-partials.card>


