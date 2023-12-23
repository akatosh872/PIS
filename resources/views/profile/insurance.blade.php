@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card p-4" style="max-width: 400px; margin: 0 auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h2 class="text-center mb-4">Деталі полісу</h2>

            <p><strong>Тип страхування:</strong> {{ $insurance->insuranceType->name }}</p>
            <p><strong>Щомісячний внесок:</strong> {{ $insurance->monthly_fee }}</p>
            <p><strong>Дата початку дії:</strong> {{ $insurance->start_date }}</p>
            <p><strong>Дата закінчення дії:</strong> {{ $insurance->end_date }}</p>
            <p><strong>Кількість внесків:</strong> {{ $insurance->installments }}</p>
            <p><strong>Статус:</strong> {{ $insurance->enable ? 'Активний' : 'Неактивний' }}</p>

            <a href="{{ route('profile.insurances') }}" class="btn btn-secondary mt-3">Назад до списку полісів</a>
            <a href="{{ route('payment.form') }}" class="btn btn-secondary mt-3">Перейти до оплати</a>

        </div>
    </div>
@endsection
