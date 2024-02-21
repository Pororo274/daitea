@extends('layouts.app-layout')

@section('content')
<section class="mt-10">
    <div class="container">
        <div class="flex gap-4">
            <x-customs.category-button is-active="{{ empty($currentCategory) }}" link="/?">
                Все
            </x-customs.category-button>
            @foreach($categories as $category)
                <div class="relative group">
                    <div class="absolute top-full bg-gray-50 px-4 py-2 rounded-lg hidden drop-shadow-xl group-hover:block">
                        <a href="/categories/{{ $category['id'] }}/edit" class="block px-4 py-2 text-blue-400 rounded-lg font-medium hover:bg-blue-200">Редактировать</a>
                        <x-customs.form action="/categories/{{ $category['id'] }}">
                            @method('DELETE')
                            <button class="block px-4 py-2 text-red-400 rounded-lg font-medium hover:bg-red-200">Удалить</button>
                        </x-customs.form>
                    </div>
                    <x-customs.category-button is-active="{{ $category['id'] === $currentCategory }}" link="/?c={{ $category['id'] }}">
                        {{ $category['name'] }}
                    </x-customs.category-button>
                </div>

            @endforeach
        </div>
        <div class="grid grid-cols-4 gap-6 mt-6">
            @foreach($products as $product)
                <div class="rounded-lg border border-gray-400 p-6">
                    <figure class="overflow-hidden w-full h-[200px] rounded-lg">
                        <img src="http://localhost:8000/storage/{{ $product['image_path'] }}" alt="" class="object-cover w-full h-full">
                    </figure>
                    <h3 class="text-lg font-medium mt-4">{{ $product['name'] }}</h3>
                    <p class="font-medium text-2xl mt-4">{{ $product['price'] }} руб.</p>
                </div>
            @endforeach

        </div>
    </div>
</section>
@endsection
