<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Demain Demo')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="min-h-dvh bg-zinc-50 text-zinc-900">
    {{-- Header fijo --}}
    <header class="fixed top-0 inset-x-0 z-50 border-b bg-white/80 backdrop-blur">
        <div class="mx-auto max-w-md px-4 h-14 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="h-9 w-9 rounded-xl bg-zinc-900 text-white grid place-items-center font-semibold">D</div>
                <div class="leading-tight">
                    <div class="text-sm font-semibold">Demain</div>
                    <div class="text-xs text-zinc-500">Work Orders · Demo</div>
                </div>
            </div>

            <div class="flex items-center gap-2">
                @if (!empty($isDemo))
                    <span
                        class="text-[11px] px-2 py-1 rounded-full bg-amber-100 text-amber-900 border border-amber-200">
                        DEMO
                    </span>
                @endif
                <a href="{{ route('demo.profile') }}"
                    class="h-9 w-9 rounded-full bg-zinc-200 grid place-items-center text-sm font-semibold">
                    SG
                </a>
            </div>
        </div>
    </header>

    {{-- Contenido (con padding para header + tabbar) --}}
    <main class="mx-auto max-w-md px-4 pt-16 pb-20">
        {{ $slot }}
    </main>

    {{-- Tab bar fijo --}}
    <nav class="fixed bottom-0 inset-x-0 z-50 border-t bg-white/90 backdrop-blur">
        <div class="mx-auto max-w-md px-4 h-16 grid grid-cols-3 gap-2 items-center">
            <a href="{{ route('demo.orders') }}"
                class="h-11 rounded-xl grid place-items-center text-sm font-medium {{ request()->routeIs('demo.orders*') ? 'bg-zinc-900 text-white' : 'bg-zinc-100' }}">
                Órdenes
            </a>
            <a href="{{ route('demo.orders.new') }}"
                class="h-11 rounded-xl grid place-items-center text-sm font-medium {{ request()->routeIs('demo.orders.new') ? 'bg-zinc-900 text-white' : 'bg-zinc-100' }}">
                + Nueva
            </a>
            <a href="{{ route('demo.profile') }}"
                class="h-11 rounded-xl grid place-items-center text-sm font-medium {{ request()->routeIs('demo.profile') ? 'bg-zinc-900 text-white' : 'bg-zinc-100' }}">
                Perfil
            </a>
        </div>
    </nav>

    @livewireScripts
</body>

</html>
