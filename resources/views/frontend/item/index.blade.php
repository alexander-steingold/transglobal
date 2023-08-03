<x-base-layout title="Landing Page">
    <x-app-partials.container>
        <div class="flex flex-wrap lg:ml-10 lg:mr-10 sm:ml-5 sm:mr-5 mx-auto">
            <div class="w-full md:w-1/3">
                <x-app-partials.sidebar-search
                    :targets="$targets"
                    :types="$types"
                    :features="$features"
                />
            </div>
            <div class="w-full md:w-2/3 lg:pl-8 sm:pl-5 ">
                @forelse($items as $item)
                    <a href="{{ route('item.show', $item) }}">
                        <x-item.item-card class="mb-8" :item="$item"/>
                    </a>
                @empty
                    No properties available
                @endforelse
            </div>

        </div>
        <div class="mb-8 lg:ml-10 lg:mr-10 sm:ml-5 sm:mr-5 mx-auto">
            {{ $items->links() }}
        </div>
    </x-app-partials.container>
</x-base-layout>

