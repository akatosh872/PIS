<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend Layout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Стилі для хедера */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 70px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        h1 {
            color: #007bff;
        }
        .alert {
            margin-top: 20px;
        }
        form {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        select,
        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="checkbox"] {
            margin-top: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        td {
            text-align: center;
        }
    </style>
    </head>
<body>
<div class="header">
    <div class="container">
        <nav>
            <ul class="header-menu">
                <li><a href="/">Клієнтська частина</a></li>
                <li><a href="/backend">На головну</a></li>
                <li><a href="{{ route('backend.shows') }}">Заяви</a></li>
                <li><a href="{{ route('backend.insurances.shows') }}">Поліси</a></li>
                <li><a href="{{ route('backend.insurances.create') }}">Новий поліс</a></li>
                <li><a href="{{ route('backend.analytics') }}">Аналітика</a></li>
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
