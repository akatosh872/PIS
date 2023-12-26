@extends('layouts.backend')

@section('content')
    <div class="container">
        <h1>Створення нового страхового полісу</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('backend.insurances.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="user_id">Користувач:</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="claim_id">Заява:</label>
                <select name="claim_id" id="claim_id" class="form-control">
                    @foreach($claims as $claim)
                        <option value="{{ $claim->id }}" data-user-id="{{ $claim->user_id }}">{{ $claim->id }}
                            - {{ $claim->information }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="insurance_type_id">Тип страхування:</label>
                <select name="insurance_type_id" id="insurance_type_id" class="form-control">
                    @foreach($insuranceTypes as $insuranceType)
                        <option value="{{ $insuranceType->id }}">{{ $insuranceType->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="monthly_fee">Щомісячна плата:</label>
                <input type="text" name="monthly_fee" id="monthly_fee" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="start_date">Дата початку:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">Дата закінчення:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="installments">Внески:</label>
                <input type="number" name="installments" id="installments" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="enable">Увімкнути:</label>
                <input type="checkbox" name="enable" id="enable" value="1" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Створити страховий поліс</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const userSelect = document.getElementById('user_id');
            const claimSelect = document.getElementById('claim_id');
            const claims = Array.from(claimSelect.options);

            userSelect.addEventListener('change', function () {
                const selectedUserId = this.value;

                // Забираємо всі опції
                claimSelect.innerHTML = '';

                // Фільтруємо опції заяв за обраним користувачем
                claims.filter(option => option.dataset.userId == selectedUserId).forEach(option => {
                    claimSelect.add(option);
                });
            });
        });
    </script>
@endsection
