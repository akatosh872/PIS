@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Claims</h1>

        @if($claims->count() > 0)
            <table class="table">
                <thead>
                <tr>
                    <th>Телефон</th>
                    <th>Інформація</th>
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
