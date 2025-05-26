<x-filament-widgets::widget>
    <x-filament::section>
        <h1 class="w-full text-center pb-4 text-xl underline font-semibold capitalize">
            {{$title?? 'the exercise announcement'}}
        </h1>

        @if($key == 'solution')
            <div class="p-2 bg-white border rounded-md">
                {{ $solution->xml_content }}
            </div>
        @else
            {!! $exercise->content !!}
        @endif

    </x-filament::section>
</x-filament-widgets::widget>
