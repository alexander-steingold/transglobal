<x-admin-layout title="Customer Registration">
    <div class=" mb-4">
        <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
            {{ __('general.courier.new_courier') }}
        </h2>
    </div>
    <x-app-partials.card class="p-8">
        <x-backend.courier.form
            :cities="$cities"
            :courier="null"
            button="{{ __('general.courier.create_new_courier') }}"
            route="{{ route('courier.store') }}"
            method="POST"
        />
    </x-app-partials.card>
</x-admin-layout>
