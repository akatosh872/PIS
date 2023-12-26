@extends('layouts.backend')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    <div class="row">
                        <div class="col-md-4">
                            <h3>Деталі заяви</h3>
                            <p><strong>Контакт:</strong> {{ $claim->contact }}</p>
                            <p><strong>Інформація:</strong> {{ $claim->information }}</p>
                            <p><strong>Статус:</strong> {{ $claim->status->name }}</p>

                            <strong>Статус:</strong>
                            @if($claim->service_type === 'consultation')
                                консультацією
                            @elseif($claim->service_type === 'policy')
                                створенням полісу
                            @elseif($claim->service_type === 'compensation')
                                страховим випадком
                            @endif
                            <p><strong>Документи:</strong></p>
                            @if($documents->count() > 0)
                                <ul>
                                    @foreach($documents as $document)
                                        <li>
                                            <a href="{{ url($document->file_path) }}"
                                               target="_blank">{{ $document->document_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Документи відсутні.</p>
                            @endif

                        </div>

                        <div class="col-md-4">
                            <h3>Інформація про клієнта</h3>
                            <p><strong>ID користувача:</strong> {{ $claim->user->id }}</p>
                            <p><strong>Ім'я:</strong> {{ $claim->user->name }}</p>
                            <p><strong>Email:</strong> {{ $claim->user->email }}</p>
                        </div>

                        <div class="col-md-4">
                            @if($claim->service_type === 'policy')
                                <h3>Створити поліс</h3>
                                <a href="{{ route('backend.insurances.create', ['claim_id' => $claim->id]) }}"
                                   class="btn btn-primary">Створити поліс</a>
                            @elseif($claim->service_type === 'compensation')
                                <h3>Деталі страхового полісу</h3>
                                @if($claim->insurance)
                                    <p><strong>Щомісячний внесок:</strong> {{ $claim->insurance->monthly_fee }}</p>
                                    <p><strong>Дата початку дії:</strong> {{ $claim->insurance->start_date }}</p>
                                    <p><strong>Дата закінчення дії:</strong> {{ $claim->insurance->end_date }}</p>
                                    <!-- Додайте інші деталі страхового полісу, якщо потрібно -->
                                @else
                                    <p>Інформація про страховий поліс відсутня.</p>
                                @endif
                            @endif
                        </div>


                        <div class="col-md-12">
                            <form action="{{ route('backend.updateClaim', $claim->id) }}" method="post">
                                @csrf
                                @method('put')
                                @if($claim->service_type === 'compensation')
                                <div class="col-md-6">
                                    <label for="payment_notes" class="form-label">Лист до компенсації</label>
                                    <textarea id="payment_notes" name="payment_notes" class="form-control">
                                        @if(!empty($compensation->payment_notes))
                                            {{ltrim($compensation->payment_notes ?? '')}}
                                        @endif
                                    </textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="payment_amount" class="form-label">Сума компенсації</label>
                                    <input type="number" value="{{$compensation->payment_amount ?? 0}}" id="payment_amount" name="payment_amount" class="form-control">
                                </div>
                                @endif
                                <div class="col-md-6">
                                    <label for="status_id" class="form-label">Оберіть статус:</label>
                                    <select name="status_id" id="status_id" class="form-control">
                                        @foreach ($statuses as $status)
                                            <option
                                                value="{{ $status->id }}" {{ $claim->status_id == $status->id ? 'selected' : '' }}>
                                                {{ $status->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" name="action" value="confirm" class="btn btn-primary">Підтвердити</button>
                                </div>
                                @if($claim->service_type === 'compensation')
                                <div class="col-md-3">
                                    <button type="submit" name="action" value="reject" class="btn btn-danger">Відмовити</button>
                                </div>
                                @endif
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
