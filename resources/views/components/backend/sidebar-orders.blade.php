@if(count($orders) > 0)
    <ol class="timeline line-space max-w-sm ml-1">
        @foreach($orders as $order)
            <li class="timeline-item">
                <div
                    class="timeline-item-point rounded-full border-2 border-success dark:border-navy-400"></div>
                <a href="{{ route('order.show', $order) }}" class="inline-flex w-full">
                    <div class="timeline-item-content flex-1 pl-4 sm:pl-8">
                        <div class="flex flex-col justify-between pb-2 sm:flex-row sm:pb-0">
                            <p class="pb-2 font-medium leading-none text-slate-600 dark:text-navy-100 sm:pb-0">
                                #{{ $order->oid }}
                            </p>
                            <span class="text-xs text-slate-400 dark:text-navy-300">
                                   {{ $order->created_at->format('d/m/Y') }}
                                </span>
                        </div>
                        <p class="py-1 text-sm flex items-center space-x-1">
                            <i class="fa-regular text-xs font-medium fa-user text-success"></i>
                            <span>
                                        {{ $order->first_name }}  {{ $order->last_name }}
                                    </span>
                        </p>
                    </div>
                </a>
            </li>
        @endforeach
    </ol>
@else
    {{ __('general.order.no_orders') }}
@endif
