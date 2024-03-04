@props(['listing'])
<x-card>
    <div class="flex">
        @if (is_null($listing->logo))
            <img
                class="w-48 mr-6 md:block h-40"
                src="{{ asset("images/no-image.png") }}"
                alt=""
            />
        @else
            <img
                class="w-48 mr-6 md:block rounded h-40"
                src="storage/{{$listing->logo}}"
                alt=""
            />
        @endif
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing["id"]}}/{{$listing["title"]}}"
                class="hover:text-red-600">
                    {{ $listing->title }}
                </a>
            </h3>
            <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
            <x-listing-tags :tagsCsv="$listing->tags"/>
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</x-card>