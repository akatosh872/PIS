@extends('layouts.backend')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Інформація про клієнта</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>ID користувача:</strong> {{ $claim->user->id }}</p>
                                <p><strong>Ім'я:</strong> {{ $claim->user->name }}</p>
                                <p><strong>Email:</strong> {{ $claim->user->email }}</p>
                                <p><strong>Телефон:</strong> {{ $claim->contact }}</p>

                                <p><strong>Документи:</strong></p>
                                @if($documents->count() > 0)
                                    <ul>
                                        @foreach($documents as $document)
                                            <li>
                                                <a href="{{ url($document->file_path) }}" target="_blank">{{ $document->document_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Документи відсутні.</p>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <p><strong>Інформація:</strong> {{ $claim->information }}</p>
                                <p><strong>Статус:</strong> {{ $claim->status->name }}</p>

                                <p><strong>Звернення за:</strong>
                                    @if($claim->service_type === 'consultation')
                                        консультацією</p>
                                @elseif($claim->service_type === 'policy')
                                    створенням полісу</p>
                                @elseif($claim->service_type === 'compensation')
                                    страховим випадком</p>
                                @endif

                                @if ($claim->additional_fields)
                                    @foreach (json_decode($claim->additional_fields) as $fieldNum => $fieldValue)
                                        <p><strong>{{json_decode($claim->insuranceType->additional_fields, true)[$fieldNum] }}:</strong> {{$fieldValue}}</p>
                                    @endforeach
                                @endif
                            </div>

                            @if($claim->service_type === 'compensation')
                                <div class="col-md-6">
                                    <h5>Деталі страхового полісу</h5>
                                    @if($claim->insurance)
                                        <p><strong>Щомісячний внесок:</strong> {{ $claim->insurance->monthly_fee }}</p>
                                        <p><strong>Дата початку дії:</strong> {{ $claim->insurance->start_date }}</p>
                                        <p><strong>Дата закінчення дії:</strong> {{ $claim->insurance->end_date }}</p>
                                    @else
                                        <p>Інформація про страховий поліс відсутня.</p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <h5>Змінити статус</h5>
                                <form action="{{ route('backend.updateClaim', $claim->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                    <div class="form-group">
                                        <label for="status_id">Оберіть статус:</label>
                                        <select name="status_id" id="status_id" class="form-control">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->id }}" {{ $claim->status_id == $status->id ? 'selected' : '' }}>
                                                    {{ $status->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name="action" value="confirm" class="btn btn-primary">Підтвердити</button>
                                        @if($claim->service_type === 'compensation')
                                            <button type="submit" name="action" value="reject" class="btn btn-danger">Відмовити</button>
                                        @endif
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-6">
                                <h5>Створити поліс</h5>
                                <a href="{{ route('backend.insurances.create', ['claim_id' => $claim->id]) }}" class="btn btn-primary">Створити поліс</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
