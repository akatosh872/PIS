@extends('layouts.backend')

@section('content')
    <div class="container">
        <h1>Головна сторінка</h1>
        <p>Ласкаво просимо, {{ auth()->user()->name }}!</p>

        <!-- Додайте додатковий вміст, якщо потрібно -->

        <div>
            <a href="{{ route('backend.shows') }}" class="btn btn-primary">Переглянути всі заяви</a>
        </div>

        <div>
            <a href="{{ route('backend.insurances.shows') }}" class="btn btn-success">Переглянути всі поліси</a>
        </div>
    </div>
@endsection
