<x-admin-layout title="Customer Profile">
    <div class="grid lg:gap-6 lg:grid-cols-2  sm:grid-cols-2 sm:mb-4 xs:mb-4">
        <div>
            <h2 class="text-2xl  text-slate-600 dark:text-navy-100">
                {{ __('general.courier.courier_profile') }}
            </h2>
        </div>
        <div class="flex lg:justify-end sm:justify-end">
            <x-app-partials.link-button class="text-sm py-1.5" href="{{ route('courier.edit', $courier) }}"
                                        type="success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                </svg>
                {{ __('general.courier.edit_courier') }}
            </x-app-partials.link-button>
        </div>
    </div>

    <div class="grid gap-6 lg:grid-cols-3 ">
        <div class="col-span-2">
            <x-app-partials.card class="p-6">
                <div class="flex justify-start w-full space-x-1 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-success shrink-0" fill="none"
                         viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2"
                              d="M5 19.111c0-2.413 1.697-4.468 4.004-4.848l.208-.035a17.134 17.134 0 015.576 0l.208.035c2.307.38 4.004 2.435 4.004 4.848C19 20.154 18.181 21 17.172 21H6.828C5.818 21 5 20.154 5 19.111zM16.083 6.938c0 2.174-1.828 3.937-4.083 3.937S7.917 9.112 7.917 6.937C7.917 4.764 9.745 3 12 3s4.083 1.763 4.083 3.938z"></path>
                    </svg>
                    <div class="flex w-full justify-between items-center">
                        <h3 class="text-xl text-slate-600">
                            {{ $courier->first_name }}
                            {{ $courier->last_name }}
                        </h3>
                        <span class="text-success text-lg">#{{ $courier->cid }}</span>
                    </div>
                </div>

                <x-app-partials.divider/>

                <div class="mt-4">
                    <div class="font-medium text-slate-700 mb-4 lg:sm:flex lg:sm:justify-between">
                        {{ __('general.user.id_number')  }}:
                        <span class="font-normal">{{ $courier->pid }}</span>
                    </div>

                    <div class="font-medium text-slate-700 mb-4 lg:sm:flex lg:sm:justify-between">
                        {{ __('general.user.city')  }}:
                        <span class="font-normal">{{ optional($courier->city)->name }}</span>
                    </div>

                    <div class="font-medium text-slate-700 mb-4 lg:sm:flex lg:sm:justify-between">
                        {{ __('general.user.address')  }}:
                        <span class="font-normal">{{ $courier->address }} </span>
                    </div>

                    <div class="font-medium text-slate-700 mb-4 lg:sm:flex lg:sm:justify-between">
                        {{ __('general.user.phone')  }}:
                        <span class="font-normal">{{ $courier->phone }}</span>
                    </div>

                    <div class="font-medium text-slate-700 mb-4 lg:sm:flex lg:sm:justify-between">
                        {{ __('general.user.mobile')  }}:
                        <span class="font-normal">{{ $courier->mobile }}</span>
                    </div>

                    <div class="font-medium text-slate-700 mb-4 lg:sm:flex lg:sm:justify-between">
                        {{ __('general.user.email')  }}:
                        <span class="font-normal">{{ $courier->email }}</span>
                    </div>

                    <div class="font-medium text-slate-700 mb-4 lg:sm:flex lg:sm:justify-between">
                        {{ __('general.user.created_at')  }}:
                        <span class="font-normal">{{ $courier->created_at->format('d/m/Y') }}</span>
                    </div>

                    <div class="font-medium text-slate-700 mb-4 lg:sm:flex lg:sm:justify-between">
                        {{ __('general.user.status')  }}:
                        @if($courier->status->value == 'active')
                            <div class="h-3.5 w-3.5 inline-block rounded-full border-2 border-success"></div>
                        @else
                            <div class="h-3.5 w-3.5 inline-block rounded-full border-2 border-error"></div>
                        @endif
                    </div>

                    <div class="font-medium text-slate-700 mb-4">
                        {{ __('general.user.remarks')  }}:
                        <div class="font-normal mt-2">{{ $courier->remarks }}</div>
                    </div>

                </div>
            </x-app-partials.card>
        </div>
        <div>
            <x-app-partials.card class="p-6">
                <h3 class="text-xl text-slate-500">{{ __('general.courier.courier_orders') }}</h3>
            </x-app-partials.card>
        </div>
    </div>

</x-admin-layout>
