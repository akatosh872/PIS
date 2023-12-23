@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card p-4" style="max-width: 400px; margin: 0 auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h2 class="text-center mb-4">Деталі заявки</h2>

            <p><strong>Телефон:</strong> {{ $claim->contact }}</p>
            <p><strong>Інформація:</strong> {{ $claim->information }}</p>
            <p><strong>Тип страхування:</strong> {{ $claim->insuranceType->name }}</p>
            <p><strong>Статус:</strong> {{ $claim->status->name }}</p>

            <h3 class="mt-4">Документи</h3>
            @foreach($documents as $document)
                <a href="http://pis/{{$document->file_path}}" class="mb-2 d-block">{{ $document->document_name }}</a>
            @endforeach

            <a href="{{ route('claim.shows') }}" class="btn btn-secondary mt-3">Назад до списку заяв</a>
        </div>
    </div>
@endsection
