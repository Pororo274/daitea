@extends('layouts.app-layout')

@section('content')
    <section class="mt-6">
        <div class="container">
            <x-customs.form action="/categories/{{ $category['id'] }}">
                @method('PUT')
                <div class="grid gap-4">
                    <x-customs.headers.h1>Редактирование категории</x-customs.headers.h1>
                    <x-ui.input name="name" placeholder="Название"></x-ui.input>
                    <x-ui.submit-button>Обновить</x-ui.submit-button>
                </div>
            </x-customs.form>
        </div>
    </section>
@endsection
