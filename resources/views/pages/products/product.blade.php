@extends('layouts.app-layout')

@section('content')
<section class="mt-6">
    <div class="container">
        <div class="flex gap-6">
            <figure class="overflow-hidden w-[500px] h-[200px] rounded-lg">
                <img src="http://daitea/storage/{{ $product['image_path'] }}" alt="" class="w-full h-full object-cover">
            </figure>
            <div class="flex-1">
                <x-customs.headers.h1>{{ $product['name']}}</x-customs.headers.h1>
                <p class="mt-4">
                    {{ $product['description'] }}
                </p>
                <div class="mt-6">
                    <x-customs.headers.h1>{{ $product['price']}} руб.</x-customs.headers.h1>
                </div>
                <x-states.admin>
                    <a href="/products/{{ $product['id'] }}/edit" class="block text-blue-500">Редактировать</a>
                    <x-customs.form action="/products/{{ $product['id'] }}">
                        @method('DELETE')
                        <button class="block text-red-500">Удалить</button>
                    </x-customs.form>
                    
                </x-states.admin>
            </div>
        </div>
    </div>
</section>
@endsection
