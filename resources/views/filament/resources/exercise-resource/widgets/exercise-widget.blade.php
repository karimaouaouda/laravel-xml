<x-filament-widgets::widget>
    <x-filament::section>
        <h1 class="w-full text-center pb-4 text-xl underline font-semibold capitalize">
            {{$title?? 'the exercise announcement'}}
        </h1>
        {!! $exercise->content !!}

    </x-filament::section>
</x-filament-widgets::widget>
