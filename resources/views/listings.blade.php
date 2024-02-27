@extends('layout')


@section('content')
    <div class="container mx-auto lg:grid lg:grid-cols-2 lg:gap-4">
    @if (empty($dataArray))
        <p>Nada aqui 😓</p>
        @dd($dataArray);
    @else
        @foreach ($dataArray as $item)
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                <div class="flex">
                    <img
                        class="hidden w-48 mr-6 md:block"
                        src="{{ asset('images/no-image.png') }}"
                        alt=""
                    />
                    <div>
                        <h3 class="text-2xl">
                            <a href="/listings/{{$item["id"]}}/{{$item["title"]}}">{{ $item->title }}</a>
                        </h3>
                        <div class="text-xl font-bold mb-4">{{ $item->company }}</div>
                        <ul class="flex">
                            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                <a href="#">Laravel</a>
                            </li>
                            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                <a href="#">API</a>
                            </li>
                            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                <a href="#">Backend</a>
                            </li>
                            <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                <a href="#">Vue</a>
                            </li>
                        </ul>
                        <div class="text-lg mt-4">
                            <i class="fa-solid fa-location-dot"></i> {{$item->location}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    </div>
@endsection