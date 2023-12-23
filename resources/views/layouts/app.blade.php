<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страхування - Головна</title>
    <!-- Підключення бутстрапа -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Додаткові стилі -->
    <style>
        /* Задаємо висоту для html і body */
        html, body {
            height: 100%;
        }
        /* Задаємо висоту для контенту */
        .content {
            min-height: calc(100% - 120px); /* 120px - це висота навігаційної панелі і футера */
        }
        /* Задаємо відступ для футера */
        .footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<!-- Навігаційна панель -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            Страхування
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Перемикання навігації">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Головна</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/registration">Реєстрація</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Логін</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.insurances') }}">Поліси</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('claim.shows') }}">Заяви на поліс</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.index') }}">Особистий кабінет ({{ Auth::user()->name }})</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Контент -->
<div class="content">
    @yield('content')
</div>

<!-- Футер -->
<footer class="bg-dark text-white p-4 text-center footer">
    <p>© 2023 Страхування. Всі права захищені.</p>
</footer>
<!-- Підключення бутстрапа -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
