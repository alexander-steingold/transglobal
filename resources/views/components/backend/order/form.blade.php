<form class="" action="{{ $route  }}" method="post">
    @method($method)
    @csrf
    <input type="hidden" name="country_id" value="109"/>
    <input type="hidden" name="oid" value="{{ isset($order) ? $order->oid : (random_int(100000, 999999) ) }}"/>


    <h3 class="text-success text-lg font-normal">
        {{ __('general.order.general_details') }}
        <x-app-partials.divider/>
    </h3>
    <main class="grid w-ful gap-x-6 gap-y-2 lg:grid-cols-2 place-items-center mb-2">
        <div class=" w-full h-full">
            <x-forms.input-label for="customer_id" required="1" value="{{ __('general.order.customer') }}"/>
            <x-forms.select name="customer_id">
                <option value=""></option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" @selected(old(
                        'customer_id', optional($order)->customer_id) == $customer->id)>
                        {{ $customer->first_name }} {{ $customer->last_name }}
                    </option>
                @endforeach
            </x-forms.select>
            <x-forms.input-error :messages="$errors->get('customer_id')" class="mt-2"/>
        </div>
        <div class=" w-full h-full">
            <x-forms.input-label for="courier_id" value="{{ __('general.order.courier') }}"/>
            <x-forms.select name="courier_id">
                <option value=""></option>
                @foreach($couriers as $courier)
                    <option value="{{ $courier->id }}" @selected(old(
                        'courier_id', optional($courier)->courier_id) == $courier->id)>
                        {{ $courier->first_name }} {{ $courier->last_name }}
                    </option>
                @endforeach
            </x-forms.select>
            <x-forms.input-error :messages="$errors->get('courier_id')" class="mt-2"/>
        </div>
        <div class=" w-full h-full">
            <x-forms.input-label for="status" required="1"
                                 value="{{ __('general.user.status') }}"/>
            <x-forms.select name="status">
                <option value=""></option>
                @foreach($statuses as $status)
                    <option value="{{ $status }}" @selected(old(
                        'status', optional($order)->status) == $status)>
                        {{ __('general.order.statuses.'.$status)  }}
                    </option>
                @endforeach
            </x-forms.select>
            <x-forms.input-error :messages="$errors->get('status')" class="mt-2"/>
        </div>
        <div class=" w-full h-full">
            <x-forms.input-label for="barcode" value="{{ __('general.order.barcode') }}"/>
            <x-forms.text-input name="barcode" type="number"
                                value="{{ old('barcode', optional($order)->barcode) }}"/>
            <x-forms.input-error :messages="$errors->get('barcode')" class="mt-2"/>
        </div>

    </main>

    <h3 class="text-success text-lg  mt-4 font-normal">
        {{ __('general.order.recipient_details') }}
        <x-app-partials.divider/>
    </h3>
    <main class="grid w-ful mt-3 gap-x-6 gap-y-2 lg:grid-cols-2 place-items-center mb-2">
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="first_name" required="1"
                                 value="{{ __('general.user.first_name') }}"/>
            <x-forms.text-input name="first_name" placeholder=""
                                value="{!! old('first_name', optional($order)->first_name) !!}"/>
            <x-forms.input-error :messages="$errors->get('first_name')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="last_name" required="1"
                                 value="{{ __('general.user.last_name') }}"/>
            <x-forms.text-input name="last_name" placeholder=""
                                value="{{ old('last_name', optional($order)->last_name) }}"/>
            <x-forms.input-error :messages="$errors->get('last_name')" class="mt-2"/>
        </div>

        <div class="mb-2  w-full h-full" x-data="{ selectedCountry: '{{ old('country_id') }}' }">
            <x-forms.input-label for="country_id" required="1"
                                 value="{{ __('general.user.country') }}"/>
            <select name="country_id" class="mt-1.5 text-slate-20 w-full"
                    x-data="{ selectedCountry: 147 }"
                    x-bind:value="selectedCountry"
                    x-init="
        $el._tom = new Tom($el, {
        create: true,
        sortField: { field: 'text', direction: 'asc' }
        });
        $watch('selectedCountry', value => $el._tom.setValue(value))"
            >
                <option value=""></option>
                @foreach($countries as $country)
                    <option
                        value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <x-forms.input-error :messages=" $errors->get('country_id')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="city" required="1"
                                 value="{{ __('general.user.city') }}"/>
            <x-forms.text-input name="city" placeholder=""
                                value="{{ old('city', optional($order)->city) }}"/>
            <x-forms.input-error :messages="$errors->get('city')" class="mt-2"/>
        </div>


        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="address" required="1"
                                 value="{{ __('general.user.address') }}"/>
            <x-forms.text-input name="address" value="{{ old('address', optional($order)->address) }}"/>
            <x-forms.input-error :messages="$errors->get('address')" class="mt-2"/>
        </div>
    </main>
    <h3 class="text-success text-lg font-normal">
        {{ __('general.order.contact_details') }}
        <x-app-partials.divider/>
    </h3>
    <main class="grid mt-3 w-ful gap-x-6 gap-y-2 lg:grid-cols-2 place-items-center ">
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="phone" value="{{ __('general.user.phone') }}"/>
            <x-forms.text-input name="phone" type="number" value="{{ old('phone', optional($order)->phone) }}"/>
            <x-forms.input-error :messages="$errors->get('phone')" class="mt-2"/>
        </div>

        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="mobile" required="1"
                                 value="{{ __('general.user.mobile') }}"/>
            <x-forms.text-input name="mobile" type="number" value="{{ old('mobile', optional($order)->mobile) }}"/>
            <x-forms.input-error :messages="$errors->get('mobile')" class="mt-2"/>
        </div>
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="email" value="{{ __('general.user.email') }}"/>
            <x-forms.text-input name="email" value="{{ old('email', optional($order)->email) }}"/>
            <x-forms.input-error :messages="$errors->get('email')" class="mt-2"/>
        </div>

        {{--        <div class="lg:col-span-3 sm:col-span-2  w-full h-full">--}}
        {{--            @isset($customer)--}}
        {{--                <label class="inline-flex items-center space-x-2">--}}
        {{--                    <span class="text-sm font-medium text-slate-700">{{ __('general.user.status') }}</span>--}}
        {{--                    <input--}}
        {{--                        name="status"--}}
        {{--                        class="form-switch h-5 w-10 rounded-full bg-slate-300 before:rounded-full before:bg-slate-50 checked:!bg-success checked:before:bg-white dark:bg-navy-900 dark:before:bg-navy-300 dark:checked:before:bg-white"--}}
        {{--                        type="checkbox"--}}
        {{--                        {{ optional($customer)->status->value == 'active' ? 'checked' : '' }}--}}
        {{--                    />--}}
        {{--                </label>--}}
        {{--            @endisset--}}
        {{--        </div>--}}
    </main>
    <h3 class="text-success text-lg  mt-2 font-normal">
        {{ __('general.order.payment_details') }}
        <x-app-partials.divider/>
    </h3>
    <main class="grid w-ful  gap-x-6 gap-y-2 lg:grid-cols-2 place-items-center mb-2">
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="prepayment" value="{{ __('general.order.prepayment') }}"/>
            <x-forms.select name="prepayment">
                <option value=""></option>
                @for($i=1; $i<10; $i++)
                    <option value="{{ $i * config('app.box_price') }}" @selected(old(
                        'prepayment', optional($order)->prepayment) == ($i * config('app.box_price')))>
                        {{ $i . ' x ' . config('app.box_price') . ' NIS '. __('general.order.box') }}
                    </option>
                @endfor
            </x-forms.select>
            <x-forms.input-error :messages="$errors->get('prepayment')" class="mt-2"/>
        </div>
        <div class="mb-2 w-full h-full">
            <x-forms.input-label for="payment" value="{{ __('general.order.payment') }}"/>
            <x-forms.text-input name="payment" type="number" value="{{ old('payment', optional($order)->payment) }}"/>
            <x-forms.input-error :messages="$errors->get('payment')" class="mt-2"/>
        </div>
    </main>
    <h3 class="text-success text-lg  font-normal">
        {{ __('general.order.additional_details') }}
        <x-app-partials.divider/>
    </h3>
    <main class="grid w-ful  gap-6 lg:grid-cols-2 place-items-center mb-2">
        <div class="lg:col-span-2  w-full h-full">
            <x-forms.input-label for="remarks" value="{{ __('general.user.remarks') }}"/>
            <x-forms.textarea rows="3" placeholder="" name="remarks">
                {{ old('remarks', optional($order)->remarks)  }}
            </x-forms.textarea>
            <x-forms.input-error :messages="$errors->get('remarks')" class="mt-2"/>
        </div>
    </main>

    <x-forms.button-success class="mt-2">
        {{ $button }}
    </x-forms.button-success>
</form>
