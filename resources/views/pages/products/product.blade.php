@extends('layouts.app-layout')

@section('content')
<section class="mt-6">
    <div class="container">
        <div class="flex gap-6">
            <figure class="overflow-hidden w-[500px] h-[200px] rounded-lg">
                <img src="http://localhost:8000/storage/{{ $product['image_path'] }}" alt="" class="w-full h-full object-cover">
            </figure>
            <div class="flex-1">
                <x-customs.headers.h1>{{ $product['name']}}</x-customs.headers.h1>
            </div>
        </div>
    </div>
</section>
@endsection
