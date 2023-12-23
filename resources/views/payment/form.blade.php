@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card p-4" style="max-width: 400px; margin: 0 auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h2 class="text-center mb-4">Оплата</h2>

            <form action="{{ route('payment.process') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="card_number" class="form-label">Номер картки:</label>
                    <input type="text" name="card_number" id="card_number" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Сума:</label>
                    <input type="number" name="amount" id="amount" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="payment_method" class="form-label">Виберіть спосіб оплати:</label>
                    <select name="payment_method" id="payment_method" class="form-control">
                        @foreach($payment_systems as $payment_method)
                            <option value="{{ $payment_method->id }}">{{$payment_method->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="insurance_id" class="form-label">Виберіть поліс для оплати:</label>
                    <select name="insurance_id" id="insurance_id" class="form-control">
                        @foreach($insurances as $insurance)
                            <option value="{{ $insurance->id }}">{{ $insurance->insuranceType->name }} з {{ $insurance->start_date }} до {{ $insurance->end_date }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Оплатити</button>
            </form>
        </div>
    </div>
@endsection
