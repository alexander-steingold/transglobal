<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} @isset($title)
            - {{ $title }}
        @endisset
    </title>

    <!-- CSS & JS Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;600&family=Pacifico&family=Ruslan+Display&family=Roboto:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script>
        /**
         * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
         */
        localStorage.getItem("_x_darkMode_on") === "true" &&
        document.documentElement.classList.add("dark");
    </script>

    @isset($head)
        {{ $head }}
    @endisset

</head>

<body x-data x-bind="$store.global.documentBody"
      class="h-full @isset($isSidebarOpen) {{ $isSidebarOpen === 'true' ? 'is-sidebar-open' : '' }} @endisset @isset($isHeaderBlur) {{ $isHeaderBlur === 'true' ? 'is-header-blur' : '' }} @endisset @isset($hasMinSidebar) {{ $hasMinSidebar === 'true' ? 'has-min-sidebar' : '' }} @endisset @isset($headerSticky) {{ $headerSticky === 'false' ? 'is-header-not-sticky' : '' }} @endisset">

<!-- App preloader-->
<x-app-preloader/>
<x-backend.navbar/>

@if(session('success'))
    <x-app-partials.alert class="bg-green-100 text-green-700">
        <p class="font-bold">{{ __('general.alert_titles.success') }}</p>
        {{ session('success') }}
    </x-app-partials.alert>
@endif
@if(session('error'))
    <x-app-partials.alert class="bg-red-100 text-red-700">
        <p class="font-bold">{{ __('general.alert_titles.error') }}</p>
        {{ session('error') }}
    </x-app-partials.alert>
@endif
@if(session('warning'))
    <x-app-partials.alert class="bg-amber-300 text-amber-700">
        <p class="font-bold">{{ __('general.alert_titles.warning') }}!</p>
        {{ session('warning') }}
    </x-app-partials.alert>
@endif
<x-app-partials.container class="relative">
    {{--    <div class="bg">--}}
    {{--        <img src="{{ asset('images/bg2.jpg')  }}" alt="">--}}
    {{--    </div>--}}
    <!-- Page Wrapper -->
    <div id="root" class=" mt-8  dark:bg-navy-900" x-cloak>
        {{ $slot }}
    </div>
</x-app-partials.container>


<!--
This is a place for Alpine.js Teleport feature
@see https://alpinejs.dev/directives/teleport
-->
<div id="x-teleport-target"></div>

<script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
</script>

@isset($script)
    {{ $script }}
@endisset

<script>
    function init() {
        this.selectedCheckboxes = [];
        this.allSelected = false;

        this.$watch('selectedCheckboxes', value => {
            this.isExportDisabled = value.length === 0;
        });
    }

    function toggleSelectAll() {
        if (this.allSelected) {
            this.selectedCheckboxes = [];
        } else {
            this.selectedCheckboxes = [];
            const checkboxes = document.querySelectorAll('input[name="orders[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = true;
                this.selectedCheckboxes.push(checkbox.value);
            });
        }
    }
</script>

</body>

</html>
