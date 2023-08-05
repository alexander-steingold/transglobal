<h3 class="text-lg text-slate-500 leading-normal">
    {{ __('form.search') }}
</h3>
<x-app-partials.divider class="border-b-slate-300"/>
<form method="GET" action="{{ route('customer.index') }}">
    <!-- Search Term -->
    <div class="mt-3">
        <x-forms.input-label for="search" value="{{ __('form.search_term') }}"/>
        <x-forms.text-input name="search" value="{{ request('search') }}"/>
    </div>

    <!--Status -->
    <div class="mt-4">
        <x-forms.input-label for="status" value="{{ __('general.user.status') }}"/>
        <x-forms.select name="status">
            <option value=""></option>
            @foreach($statuses as $status)
                <option value="{{ $status }}" @selected(request('status') === $status)>
                    {{ __('general.user.statuses.'.$status)  }}
                </option>
            @endforeach
        </x-forms.select>
    </div>

    <!--City -->
    <div class="mt-4">
        <x-forms.input-label for="city_id" value="{{ __('general.user.city') }}"/>
        <x-forms.select name="city_id">
            <option value=""></option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}" @selected(request('city_id') == $city->id)>
                    {{ $city->name  }}
                </option>
            @endforeach
        </x-forms.select>
    </div>

    <!--Orders -->
    <div class="mt-4">
        <x-forms.input-label for="orders" value="{{ __('general.orders')}}"/>
        <x-forms.select name="orders">
            <option value=""></option>
            @for($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}" )>{{ $i }}</option>
            @endfor
        </x-forms.select>
    </div>


    <div>
        <x-forms.button-success class="w-full mt-4 ">
            {{ __('form.apply_filter') }}
        </x-forms.button-success>
    </div>

    <div class="flex justify-center items-center mt-2">
        <a href="{{ route('customer.index') }}" class="text-indigo-500 hover:underline">
            {{ __('form.reset_filter') }}
        </a>
    </div>
</form>
