<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Daitea</title>
</head>
<body>
    <header class="pt-6">
        <div class="container">
            <div class="flex justify-between items-center">
                <h1>DAITEA</h1>
                <nav>
                    <ul class="flex gap-4 items-center"
                    >
                        <li>
                            <a href="">Главная</a>
                        </li>
                        <x-states.admin>
                            <li>
                                <a href="">Добавить товар</a>
                            </li>
                            <li>
                                <a href="">Добавить категорию</a>
                            </li>
                        </x-states.admin>
                    </ul>
                </nav>
                <div>
                    @auth
                        Добрый день, {{ auth()->user()->name }}
                    @endauth

                    @guest
                        <a href="/auth/login">Войти</a> 
                    @endguest
                </div>
            </div>
        </div>
    </header>
    @yield('content')
</body>
</html>