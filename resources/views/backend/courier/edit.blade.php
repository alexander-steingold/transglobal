<x-admin-layout title="Edit Courier">

    <div class="grid lg:gap-6 lg:grid-cols-2  sm:grid-cols-2 sm:mb-4 xs:mb-4">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
            {{ __('general.courier.edit_courier') }}
        </div>
        <div class="flex lg:justify-end sm:justify-end items-center">
            
        </div>
    </div>
    <x-app-partials.card class="p-8">
        <x-backend.courier.form
            :cities="$cities"
            :courier="$courier"
            button="{{ __('form.save_changes') }}"
            route="{{ route('courier.update', $courier) }}"
            method="PUT"
        />
    </x-app-partials.card>
</x-admin-layout>
