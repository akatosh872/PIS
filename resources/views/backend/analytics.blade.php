@extends('layouts.backend')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Аналітика за останній місяць</h1>

        <form action="{{ route('backend.analytics') }}" method="get">
            <div class="mb-3">
                <label for="start_date" class="form-label">Початкова дата</label>
                <input type="date" id="start_date" name="start_date" value="{{ $startDate }}">
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">Кінцева дата</label>
                <input type="date" id="end_date" name="end_date" value="{{ $endDate }}">
            </div>

            <button type="submit" class="btn btn-primary">Фільтрувати</button>
        </form>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="h4">Клієнти</h2>
                    </div>
                    <div class="card-body">
                        <ul>
                            @if($users->count())
                                @foreach($users as $user)
                                    <li>{{ $user->name }} - {{ $user->email }}</li>
                                @endforeach
                            @else
                                Нових клієнтів не зареєстровано
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="h4">Внески</h2>
                    </div>
                    <div class="card-body">
                        <ul>
                            @if($payments->count() > 0)
                                @foreach($payments as $payment)
                                    <li>{{ $payment->amount }} - {{ $payment->created_at }}</li>
                                @endforeach
                            @else
                                Внесків не зареєстровано
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <h2 class="h4">Виплати</h2>
            </div>
            <div class="card-body">
                <ul>
                    @if($compensations->count() > 0)
                        @foreach($compensations as $compensation)
                            <li>{{ $compensation->payment_amount }} - {{ $compensation->created_at }}</li>
                        @endforeach
                    @else
                        Виплат не оформлено
                    @endif
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="h4">Прибуток компанії</h2>
            </div>
            <div class="card-body">
                <p>Загальний прибуток: {{ $totalProfit }}</p>
            </div>
        </div>
    </div>
@endsection
