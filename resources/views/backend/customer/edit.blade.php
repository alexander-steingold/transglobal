<x-admin-layout title="Edit Customer">
    <div class=" mb-4">
        <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
            {{ __('general.customer.edit_customer') }}
        </h2>
    </div>
    <x-app-partials.card class="p-8">
        <x-backend.customer.form
            :cities="$cities"
            :customer="$customer"
            button="{{ __('form.save_changes') }}"
            route="{{ route('customer.update', $customer) }}"
            method="PUT"
        />
    </x-app-partials.card>
</x-admin-layout>
