@extends('layouts.backend')

@section('content')
    <div class="container">
        <h1 class="mt-4 mb-4">Аналітика за останній місяць</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="h4">Нові клієнти за місяць</h2>
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach($users as $user)
                                <li>{{ $user->name }} - {{ $user->email }}</li>
                            @endforeach
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
                            @foreach($payments as $payment)
                                <li>{{ $payment->amount }} - {{ $payment->created_at }}</li>
                            @endforeach
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
                    @foreach($compensations as $compensation)
                        <li>{{ $compensation->payment_amount }} - {{ $compensation->created_at }}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="h4">Прибуток компанії</h2>
            </div>
            <div class="card-body">
                <p>Загальний прибуток за останній місяць: {{ $totalProfit }}</p>
            </div>
        </div>
    </div>
@endsection
