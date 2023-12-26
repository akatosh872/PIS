@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Мої заяви</h1>
            <a href="{{ route('claim.create') }}" class="btn btn-primary">Залишити заяву</a>
        </div>

        @if($claims->count() > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>Телефон</th>
                    <th>Інформація</th>
                    <th>Звернення за</th>
                    <th>Тип страхування</th>
                    <th>Статус</th>
                    <th>Деталі</th>
                </tr>
                </thead>
                <tbody>
                @foreach($claims as $claim)
                    <tr>
                        <td>{{ $claim->contact }}</td>
                        <td>{{ $claim->information }}</td>
                        <td>
                            @if($claim->service_type === 'consultation')
                                консультацією
                            @elseif($claim->service_type === 'policy')
                                створенням полісу
                            @elseif($claim->service_type === 'compensation')
                                страховим випадком
                            @endif
                        </td>
                        <td>{{ optional($claim->insuranceType)->name }}</td>
                        <td>{{ $claim->status->name }}</td>
                        <td><a href="{{ route('claim.show', $claim) }}">Деталі</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>Ви ще не подали жодної заяви.</p>
        @endif

        <a href="{{ route('profile.index') }}">Назад до особистого кабінету</a>
    </div>
@endsection
