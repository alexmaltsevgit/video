<x-app-layout>
    <aside class="col-span-2 py-16 px-5 bg-white shadow max-h-full overflow-y-auto">
        <x-sidebar :token="$token" :modules="$modules" />
    </aside>

    <main class="col-span-10 py-16 px-20 overflow-y-auto bg-white shadow">
        @if(empty($videos))
            <h1 class="text-6xl">Главная</h1>
        @else
            @foreach($videos as $video)
                <div class="w-full flex justify-center pb-20">
                    <video class="w-3/4" controls>
                        <source src="{{ $video }}">
                    </video>
                </div>
            @endforeach
        @endif
    </main>
</x-app-layout>
