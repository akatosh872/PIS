@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card p-4" style="max-width: 400px; margin: 0 auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h2 class="text-center mb-4">Створення нової заявки</h2>
            <form action="{{ route('claim.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input id="phone" name="phone" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="information" class="form-label">Інформація</label>
                    <textarea id="information" name="information" required class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="insurance_type" class="form-label">Тип страхування</label>
                    <select id="insurance_type" name="insurance_type" required class="form-control">
                        @foreach($insuranceTypes as $insuranceType)
                            <option value="{{ $insuranceType->id }}">{{ $insuranceType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="document" class="form-label">Документ</label>
                    <input type="file" id="document" name="document" required class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-block">Відправити заявку</button>
            </form>
        </div>
    </div>
@endsection
