@extends('layouts.backend')

@section('content')
    <div class="container">
        <h1>Усі види страхувань</h1>

        @if($insurances->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-bordered" style="width: 100%" id="insurances-table">
                    <thead>
                    <tr>
                        <th>Тип страхування</th>
                        <th>Щомісячний внесок</th>
                        <th>Дата початку</th>
                        <th>Дата закінчення</th>
                        <th>Термін полісу</th>
                        <th>Кількість внесків</th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($insurances as $insurance)
                        <tr>
                            <td>{{ $insurance->insuranceType->name }}</td>
                            <td>{{ $insurance->monthly_fee }}</td>
                            <td>{{ $insurance->start_date }}</td>
                            <td>{{ $insurance->end_date }}</td>
                            <td>{{ \Carbon\Carbon::parse($insurance->end_date)->diffInDays(\Carbon\Carbon::parse($insurance->start_date)) }}</td>
                            <td>{{ $insurance->installments }}</td>
                            <td>
                                <a href="{{ route('backend.insurances.edit', $insurance->id) }}" class="btn btn-primary"><i class="fas fa-edit">Редагувати</i></a>
                                <form action="{{ route('backend.insurances.destroy', $insurance->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Ви впевнені, що хочете видалити це страхування?')"><i class="fas fa-trash"></i> Видалити</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>Страхувань не знайдено.</p>
        @endif

        <a href="{{ route('backend.insurances.create') }}" class="btn btn-success">Створити страхування</a>
    </div>
@endsection

@section('scripts')
    <!-- Підключення необхідних скриптів для bootstrap, datatables та fontawesome -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        // Ініціалізація datatables для таблиці
        $(document).ready(function() {
            $('#insurances-table').DataTable();
        });
    </script>
@endsection
