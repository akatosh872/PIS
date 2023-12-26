@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card p-4"
             style="max-width: 600px; margin: 0 auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h3 class="text-center mb-4">Контактні дані</h3>
            <p><strong>Ваш ID:</strong> {{ $claim->user->id }}</p>
            <p><strong>Ім'я:</strong> {{ $claim->user->name }}</p>
            <p><strong>Email:</strong> {{ $claim->user->email }}</p>
            <p><strong>Телефон:</strong> {{ $claim->contact }}</p>

            <h2 class="text-center mb-4">Деталі заяви</h2>


            <p><strong>Звернення за:</strong>

                @if($claim->service_type === 'consultation')
                    консультацією</p>
            @elseif($claim->service_type === 'policy')
                створенням полісу</p>
            @elseif($claim->service_type === 'compensation')
                страховим випадком</p>
            @endif

            <p><strong>Інформація:</strong> {{ $claim->information }}</p>
            <p><strong>Статус заяви:</strong> {{ $claim->status->name }}</p>

            @if($claim->service_type === 'policy')
                <h3 class="text-center mb-4">Деталі полісу</h3>
                <p><strong>Тип полісу:</strong> {{ $claim->insuranceType->name }}</p>

            @elseif($claim->service_type === 'compensation')
                @if($compensation)
                    @if($compensation->payment_approved)
                        <h3>Компенсацію одобрено</h3>
                        <div>
                            <label for="payment_notes" class="form-label">Лист до компенсації</label>
                            <textarea id="payment_notes" name="payment_notes" class="form-control"
                                      readonly>{{ $compensation->payment_notes }}</textarea>
                        </div>
                        <div>
                            <label for="payment_amount" class="form-label">Сума компенсації</label>
                            <input type="number" id="payment_amount" name="payment_amount" class="form-control"
                                   value="{{ $compensation->payment_amount }}" readonly>
                        </div>
                    @else
                        <h3>В компенсації відмовлено</h3>
                        <div>
                            <label for="payment_notes" class="form-label">Лист до компенсації</label>
                            <textarea id="payment_notes" name="payment_notes" class="form-control"
                                      readonly>{{ $compensation->payment_notes }}</textarea>
                        </div>
                    @endif
                @endif
            @endif

            @if($documents->count() > 0)
                <ul>
                    @foreach($documents as $document)
                        <li>
                            <a href="{{ url($document->file_path) }}" target="_blank">{{ $document->document_name }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif

            <a href="{{ route('profile.index') }}" class="btn btn-secondary mt-3">До профілю</a>
        </div>
    </div>
@endsection
