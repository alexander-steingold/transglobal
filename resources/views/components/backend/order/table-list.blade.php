<form x-data="{ selectedCheckboxes: [], isExportDisabled: true }" x-init="init" method="post"
      action="{{ route('order.excel.export') }}">
    <div class="flex justify-start ml-5">
        <button type="submit" x-bind:disabled="isExportDisabled">
            @csrf
            <i class="fa fa-file-excel text-success text-lg" aria-hidden="true"></i>
        </button>
    </div>
    <x-app-partials.divider/>
    <div class="overflow-x-auto">
        <table class="is-hoverable w-full text-left">
            <thead>
            <tr class="border border-transparent border-b-slate-200 dark:border-b-navy-500">

                <th class="whitespace-nowrap px-3 py-3 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/6">
                    <div class="flex justify-start space-x-2 items-center">
                        <input type="checkbox" x-model="selectedCheckboxes" x-bind:checked="allSelected"
                               x-on:change="toggleSelectAll()">
                        <div>
                            {{ __('general.order.customer') }}
                        </div>
                    </div>
                </th>
                <th class="whitespace-nowrap px-3 py-3 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/6">
                    {{ __('general.order.recipient') }}
                </th>
                <th class="whitespace-nowrap px-3 py-3 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/6">
                    {{ __('general.order.price') }}
                </th>
                <th class="whitespace-nowrap px-3 py-3 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/6">

                    {{ __('general.user.status') }}
                </th>
                <th class="whitespace-nowrap px-3 py-3 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/6">
                    {{ __('general.date') }}
                </th>

                <th class="whitespace-nowrap px-3 py-3 font-semibold  text-slate-800 dark:text-navy-100 lg:px-5 w-1/6">
                    {{ __('general.actions') }}
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr class="border-y border-transparent border-b-slate-200 dark:border-b-navy-500">

                    <td class="whitespace-nowrap px-4 py-3 sm:px-5 text-slate-700 ">
                        <div class="flex justify-start space-x-2 items-center">
                            {{--                            <input type="checkbox" name="orders[]" value="{{ $order->id }}">--}}
                            <input type="checkbox" name="orders[]" x-model="selectedCheckboxes"
                                   value="{{ $order->id }}">
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('customer.show', $order->customer->id) }}"
                                   title="{{ __('general.order.customer_details') }}">
                                    {{ $order->customer->first_name }}  {{ $order->customer->last_name }}
                                </a>
                            </div>
                        </div>

                    </td>
                    <td class=" whitespace-nowrap px-4 py-3 sm:px-5 text-slate-700 ">
                        <div class="flex items-center space-x-4">
                            {{ $order->first_name }}  {{ $order->last_name }}
                        </div>
                    </td>
                    <td class="whitespace-nowrap px-4 py-3 sm:px-5 text-slate-700">
                        <div class="flex items-center space-x-4">
                            {{ $order->total_payment }} NIS
                        </div>
                    </td>
                    <td class="whitespace-nowrap px-4 py-3 sm:px-5 text-slate-700">
                        <div class="flex items-center justify-center space-x-4">
                            <div class="badge rounded-full border border-success text-success">
                                {{ __('general.order.statuses.'.$order->currentStatus->status) }}
                            </div>
                        </div>
                    </td>

                    <td class="whitespace-nowrap px-4 py-3 sm:px-5 text-slate-700">
                        <div class="flex items-center space-x-4">
                            {{ $order->created_at->format('d/m/Y') }}
                        </div>
                    </td>

                    <td class="whitespace-nowrap px-4 py-3 sm:px-5 text-slate-700">
                        <div class="flex items-center justify-center space-x-2">
                            <a href="{{ route('order.show', $order) }}" title="{{ __('general.order.order_details') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mt-px h-4.5 w-4.5" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </a>
                            <a href="{{ route('order.edit', $order) }}" title="{{ __('general.order.edit_order') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</form>
@isset($orders)
    <div class=" mt-6">
        @if(method_exists($orders, 'links'))
            {{ $orders->links('vendor.pagination.tailwind') }}
        @endif
    </div>
@endisset
