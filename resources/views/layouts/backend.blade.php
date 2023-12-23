<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend Layout</title>
    <!-- Додайте необхідні стилі чи скрипти для вашого бекенду -->
    <style>
        /* Стилі для хедера */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 70px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #2a3f54; /* фоновый цвет хедера */
            padding: 10px;
            color: #fff;
            position: fixed; /* фиксированное положение хедера */
            top: 0; /* расстояние от верха страницы */
            width: 100%; /* ширина хедера */
        }

        .header-menu {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .header-menu li {
            margin: 0 10px;
        }

        .header-menu a {
            text-decoration: none;
            color: #fff;
        }

        .header-menu a:hover {
            color: #bbd2e1;
        }

        #block1 {
            background-color: #ddd;
            height: 500px;
            margin-top: 70px; /* отступ сверху, равный высоте хедера */
        }

        #block2 {
            background-color: #fff;
            height: 1000px;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="container">
        <nav>
            <ul class="header-menu">
                <li><a href="{{ route('backend.shows') }}">Подивитись заяви</a></li>
                <li><a href="{{ route('backend.insurances.shows') }}">Подивитись поліси</a></li>
            </ul>
        </nav>
    </div>
</div>

<div class="content">
    @yield('content')
</div>

<!-- Додайте необхідні скрипти для вашого бекенду -->
</body>
</html>
