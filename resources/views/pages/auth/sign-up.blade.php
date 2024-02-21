@extends('layouts.app-layout')

@section('content')
<section class="mt-24">
    <div class="container">
        <div class="flex justify-center w-full">
            <div>
                <form action="/auth/sign-up" method="post" class="w-[400px]">
                    <h1 class="text-xl font-medium">Регистрация</h1>
                    @csrf
                    <div class="mt-4">
                        <x-ui.input name="name" placeholder="Имя"></x-ui.input>
                    </div>
                    <div class="mt-4">
                        <x-ui.input name="email" placeholder="Email"></x-ui.input>
                    </div>
                    <div class="mt-4">
                        <x-ui.input name="password" placeholder="Пароль" type="password"></x-ui.input>
                    </div>
                    <button class="px-4 py-2 bg-orange-400 rounded-lg w-full mt-4 font-medium text-gray-50 hover:bg-orange-500">Войти</button>
                </form>
                <p class="text-center mt-4">Уже есть аккаунт? <a href="/auth/login" class="text-blue-500 underline">Войдите!</a></p>
            </div>
        </div>
    </div>
</section>
@endsection