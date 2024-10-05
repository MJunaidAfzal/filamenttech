<x-filament::page>
    <style>
        body{
            background: url('{{asset('img/back3.jpg')}}');
            background-repeat:no-repeat;
            background-size:cover;
        }
    </style>
    <div class="space-y-6 divide-y divide-gray-900/10 dark:divide-white/10">
        @foreach ($this->getRegisteredMyProfileComponents() as $component)
            @unless(is_null($component))
                @livewire($component)
            @endunless
        @endforeach
    </div>
</x-filament::page>
