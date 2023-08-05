<x-admin-layout title="Customer Registration">
    <div class=" mb-4">
        <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
            {{ __('general.customer.new_customer') }}
        </h2>
    </div>
    <x-app-partials.card class="p-8">
        <x-backend.customer.form
            :cities="$cities"
            :customer="null"
            button="{{ __('general.customer.create_new_customer') }}"
            route="{{ route('customer.store') }}"
            method="POST"
        />
    </x-app-partials.card>
</x-admin-layout>
