@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h2>Основна інформація</h2>
            <p><strong>Ім'я:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <!-- Додайте інші поля профілю, які вам потрібні -->
        </div>

        <div>
        </div>
    </div>
@endsection
