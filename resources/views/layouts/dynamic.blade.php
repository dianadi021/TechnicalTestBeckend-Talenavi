<x-app-layout>
    @section('title', 'Fullstack Talenavi')

    @section('root_container')
        <header class="w-full">@include('layouts.navigation')</header>
    @endsection

    @isset($header)
        <!-- Page Heading -->
        <div
            class="bg-white shadow w-full">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </div>
    @endisset

    @isset($slot)
        {{ $slot }}
    @endisset

    @isset($footer)
        {{ $footer }}
    @endisset
</x-app-layout>
