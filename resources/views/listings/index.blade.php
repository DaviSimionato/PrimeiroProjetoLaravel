<x-layout>    
    @include('partials._hero')
    @include('partials._search')
    <div class="container mx-auto lg:grid lg:grid-cols-2 lg:gap-4">
        @if (empty($dataArray))
        <p>Nada aqui 😓</p>
        @else
        @foreach ($dataArray as $listing)
        <x-listing-card :listing="$listing"></x-listing-card>
        @endforeach
        <div class="mt-6 p-4">
            {{$dataArray->links()}}
        </div>
        @endif
    </div>
</x-layout>

