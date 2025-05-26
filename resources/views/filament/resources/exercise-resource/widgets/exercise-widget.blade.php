<x-filament-widgets::widget>
    <x-filament::section>
        <h1 class="w-full text-center pb-4 text-xl underline font-semibold capitalize">
            {{$title?? 'the exercise announcement'}}
        </h1>

        @if($key == 'solution')
            @if($solution->exercise->require_xml)
            <div class="p-2 bg-white border rounded-md">
                <h2>XML:</h2>
                {{ $solution->xml_content }}
            </div>
            @endif
            @if($solution->exercise->require_xsd)
            <div class="p-2 bg-white border rounded-md">
                <h2>XSD:</h2>
                {{ $solution->xsd_content }}
            </div>
            @endif
            @if($solution->exercise->require_xslt)
            <div class="p-2 bg-white border rounded-md">
                <h2>XSLT:</h2>
                {{ $solution->xslt_content }}
            </div>
            @endif
        @else
            {!! $exercise->content !!}
        @endif

    </x-filament::section>
</x-filament-widgets::widget>
