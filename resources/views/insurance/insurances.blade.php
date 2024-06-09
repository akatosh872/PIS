@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Мої поліси</h1>
        @if ($insurances->count() > 0)

            @section('content')
                <div class="container">
                    <h1>Мої поліси</h1>

                    @if ($insurances->count() > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Тип страхування</th>
                                <th>Щомісячний внесок</th>
                                <th>Дата початку дії</th>
                                <th>Дата закінчення дії</th>
                                <th>Статус</th>
                                <th>Деталі</th>
                                <!-- Додайте інші необхідні стовпці -->
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($insurances as $index => $insurance)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $insurance->insuranceType->name }}</td>
                                    <td>{{ $insurance->monthly_fee }}</td>
                                    <td>{{ $insurance->start_date }}</td>
                                    <td>{{ $insurance->end_date }}</td>
                                    <td>{{ $insurance->enable ? 'Активний' : 'Неактивний' }}</td>
                                    <td><a href="{{route('insurance.insurance', $index+1)}}">Деталі</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Ви ще не маєте жодного полісу.</p>
                    @endif
                </div>
            @endsection

        @else
            <p>Ви ще не маєте жодного полісу.</p>
        @endif
    </div>
@endsection
