@extends('layouts.app-layout')

@section('content')
<section class="mt-6">
    <div class="container">
        <x-customs.form action="/products">
            <div class="grid gap-4">
                <x-customs.headers.h1>Добавление чая</x-customs.headers.h1>
                <x-ui.input placeholder="Название" name="name"></x-ui.input>
                <x-ui.input placeholder="Цена" name="price"></x-ui.input>
                <x-ui.file-input name="image"></x-ui.file-input>
                <textarea name="description" class="resize-y border border-gray-400 py-2 px-4 rounded-lg focus:outline-none focus:border-orange-500" placeholder="Описание"></textarea>
                <x-ui.submit-button>Добавить</x-ui.submit-button>
            </div>
        </x-customs.form>
    </div>
</section>
@endsection
