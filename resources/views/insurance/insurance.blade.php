@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card p-4" style="max-width: 600px; margin: 0 auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h2 class="text-center mb-4">Деталі полісу</h2>

            <table class="table">
                <tbody>
                <tr>
                    <th scope="row">Тип страхування</th>
                    <td>{{ $claim->insuranceType->name }}</td>
                </tr>
                <tr>
                    <th scope="row">Щомісячний внесок</th>
                    <td>{{ $claim->insurance->monthly_fee }}</td>
                </tr>
                <tr>
                    <th scope="row">Дата початку дії</th>
                    <td>{{ date('d.m.Y', strtotime($claim->insurance->start_date)) }}</td>
                </tr>
                <tr>
                    <th scope="row">Дата закінчення дії</th>
                    <td>{{ date('d.m.Y', strtotime($claim->insurance->end_date)) }}</td>
                </tr>
                <tr>
                    <th scope="row">Кількість внесків</th>
                    <td>{{ $claim->insurance->installments }}</td>
                </tr>
                <tr>
                    <th scope="row">Статус</th>
                    <td>{{ $claim->insurance->enable ? 'Активний' : 'Неактивний' }}</td>
                </tr>

                {{-- Вивід додаткових полів --}}
                @if($claim->insuranceType->additional_fields)
                    @php
                        $additionalFields = json_decode($claim->additional_fields, true);
                        $additionalFieldsNames = json_decode($claim->insuranceType->additional_fields, true);
                    @endphp
                    @foreach($additionalFieldsNames as $key=>$field)
                        <tr>
                            <th scope="row">{{ $field }}</th>
                            <td>{{ $additionalFields[$key] }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

            <div class="text-center">
                <a href="{{ route('insurance.insurances') }}" class="btn btn-secondary mt-3">Назад до списку полісів</a>
                <a href="{{ route('payment.form') }}" class="btn btn-secondary mt-3">Перейти до оплати</a>
            </div>
        </div>
    </div>
@endsection
