<x-admin-layout title="Admin Dashboard">
    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-1">
            <x-backend.dashboard.orders_by_status :data="$data"/>
            <x-backend.skeleton/>
        </div>
        <div class="col-span-3 ">
            <div class="ml-5 mb-6">
                <h2 class="text-2xl font-medium text-slate-700 mb-4">
                    {{ __('general.welcome') }}
                    {{ auth()->user()->name }}
                </h2>


                <x-backend.dashboard.totals :data="$data"/>
                @can('is_admin', auth()->user())
                    <x-backend.dashboard.total_incomes :data="$data"/>
                @endcan
                <x-backend.dashboard.orders :data="$data"/>

                <x-backend.dashboard.customers :data="$data"/>

                <x-backend.dashboard.couriers :data="$data"/>
            </div>
        </div>
    </div>
</x-admin-layout>
