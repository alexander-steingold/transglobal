<x-admin-layout title="Customer Registration">
    <div class=" mb-4">
        <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
            {{ __('customer.new_customer') }}
        </h2>
    </div>
    <x-app-partials.card class="p-8">
        <form class="mt-4" action="{{ route('customer.store') }}" method="post">
            @method('POST') @csrf
            <input type="hidden" name="country_id" value="109"/>
            <main class="grid w-ful gap-6 grid-cols-3 place-items-center">

                <div class="mb-2 w-full h-full">
                    <x-forms.input-label for="first_name" required="1"
                                         value="{{ __('customer.first_name') }}"/>
                    <x-forms.text-input name="first_name" placeholder="" value="{{ old('first_name') }}"/>
                    <x-forms.input-error :messages="$errors->get('first_name')" class="mt-2"/>
                </div>

                <div class="mb-2 w-full h-full">
                    <x-forms.input-label for="last_name" value="{{ __('customer.last_name') }}"/>
                    <x-forms.text-input name="last_name" placeholder="" value="{{ old('last_name') }}"/>
                    <x-forms.input-error :messages="$errors->get('last_name')" class="mt-2"/>
                </div>

                <div class="mb-2 w-full h-full">
                    <x-forms.input-label for="pid" value="{{ __('customer.id_number') }}"/>
                    <x-forms.text-input name="pid" type="number"
                                        value="{{ old('pid') }}"/>
                    <x-forms.input-error :messages="$errors->get('pid')" class="mt-2"/>
                </div>

                <div class="mb-2 w-full h-full">
                    <x-forms.input-label for="city" value="{{ __('customer.city') }}"/>
                    <x-forms.text-input name="city" value="{{ old('city') }}"/>
                    <x-forms.input-error :messages="$errors->get('city')" class="mt-2"/>
                </div>

                <div class="mb-2 w-full h-full">
                    <x-forms.input-label for="address" value="{{ __('customer.address') }}"/>
                    <x-forms.text-input name="address" value="{{ old('address') }}"/>
                    <x-forms.input-error :messages="$errors->get('address')" class="mt-2"/>
                </div>

                <div class="mb-2 w-full h-full">
                    <x-forms.input-label for="zip" value="{{ __('customer.zip') }}"/>
                    <x-forms.text-input name="zip" value="{{ old('zip') }}" type="number"/>
                    <x-forms.input-error :messages="$errors->get('zip')" class="mt-2"/>
                </div>

                <div class="mb-2 w-full h-full">
                    <x-forms.input-label for="email" required="1" value="{{ __('customer.email') }}"/>
                    <x-forms.text-input name="email" value="{{ old('email') }}"/>
                    <x-forms.input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div class="mb-2 w-full h-full">
                    <x-forms.input-label for="phone" value="{{ __('customer.phone') }}"/>
                    <x-forms.text-input name="phone" type="number" value="{{ old('phone') }}"/>
                    <x-forms.input-error :messages="$errors->get('phone')" class="mt-2"/>
                </div>

                <div class="mb-2 w-full h-full">
                    <x-forms.input-label for="mobile" required="1" value="{{ __('customer.mobile') }}"/>
                    <x-forms.text-input name="mobile" type="number" value="{{ old('mobile') }}"/>
                    <x-forms.input-error :messages="$errors->get('mobile')" class="mt-2"/>
                </div>

            </main>
            <x-forms.button-success class="mt-4">
                {{ __('customer.create_new_customer') }}
            </x-forms.button-success>
        </form>
    </x-app-partials.card>
</x-admin-layout>
