<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Страхування - Головна</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%;
        }
        .content {
            min-height: calc(100% - 120px); /* 120px - це висота навігаційної панелі і футера */
        }
        .footer {
            margin-top: 20px;
        }
    </style>
</head>
<body>
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
                        <a class="nav-link" href="{{ route('insurance.insurances') }}">Поліси</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('claim.shows') }}">Залишити заяву</a>
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
<div class="container">
    <h2>Наші переваги</h2>
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('icons/quality.png') }}" width="64px" height="64px">
            <h3>Якість</h3>
            <p>Ми пропонуємо вам тільки перевірені та надійні страхові продукти, які відповідають міжнародним стандартам.</p>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('icons/price.png') }}" width="64px" height="64px">
            <h3>Ціна</h3>
            <p>Ми працюємо без посередників та додаткових комісій, тому ми можемо запропонувати вам найкращі ціни на ринку.</p>
        </div>
        <div class="col-md-4">
            <img src="{{ asset('icons/service.png') }}" width="64px" height="64px">
            <h3>Сервіс</h3>
            <p>Ми завжди готові допомогти вам у вирішенні будь-яких питань, пов'язаних зі страхуванням. Ми пропонуємо вам онлайн-консультації, гарячу лінію та персонального менеджера.</p>
        </div>
    </div>
</div>
<footer class="bg-dark text-white p-4 text-center footer">
    <p>© 2023 Страхування. Всі права захищені.</p>
</footer>
<!-- Підключення бутстрапа -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
