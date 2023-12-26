@extends('layouts.backend')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Розгляд заяв</h1>

        @if($claims->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-bordered" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Телефон</th>
                        <th>Інформація</th>
                        <th>Статус</th>
                        <th>Звернення за</th>
                        <th>Дії</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($claims as $claim)
                        <tr>
                            <td>{{ $claim->contact }}</td>
                            <td>{{ $claim->information }}</td>
                            <td>{{ $claim->status->name }}</td>
                            <td>
                                @if($claim->service_type === 'consultation')
                                    консультацією
                                @elseif($claim->service_type === 'policy')
                                    створенням полісу
                                @elseif($claim->service_type === 'compensation')
                                    страховим випадком
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('backend.show', $claim) }}" class="btn btn-info btn-sm">Деталі</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                <p>Заяв немає.</p>
            </div>
        @endif
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
