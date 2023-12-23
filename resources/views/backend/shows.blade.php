@extends('layouts.backend')

@section('content')
    <h1>Розгляд заяв</h1>

    @if($claims->count() > 0)
        <table class="table">
            <thead>
            <tr>
                <th>Телефон</th>
                <th>Інформація</th>
                <th>Тип страхування</th>
                <th>Статус</th>
                <th>Дії</th>
            </tr>
            </thead>
            <tbody>
            @foreach($claims as $claim)
                <tr>
                    <td>{{ $claim->contact }}</td>
                    <td>{{ $claim->information }}</td>
                    <td>{{ $claim->insuranceType->name }}</td>
                    <td>{{ $claim->status->name }}</td>
                    <td>
                        <a href="{{ route('backend.shows', $claim) }}">Деталі</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Заяв немає.</p>
    @endif
@endsection
