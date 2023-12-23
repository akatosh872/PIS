@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card p-4" style="max-width: 400px; margin: 0 auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h2 class="text-center mb-4">Реєстрація</h2>
            <form method="POST" action="{{ url('/registration') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Ім'я</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Електронна пошта</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" id="password" name="password" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Підтвердження паролю</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Зареєструватися</button>
            </form>
        </div>
    </div>
@endsection
