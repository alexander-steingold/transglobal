<a href="{{ $href }}"
    {{ $attributes->merge(['class' => 'rounded-md border border-slate-300 bg-white px-2.5 py-1.5 text-center font-medium text-slate-600 shadow-sm hover:bg-slate-100'])}}
>
    {{ $slot }}
</a>
