@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card p-4"
             style="max-width: 400px; margin: 0 auto; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
            <h2 class="text-center mb-4">Створення нової заяви</h2>
            <form action="{{ route('claim.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input id="phone" name="phone" required class="form-control">
                </div>

                <div class="mb-3">
                    <label for="information" class="form-label">Надайте коротку відомість</label>
                    <textarea id="information" name="information" required class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="service_type" class="form-label">Тип послуги:</label>
                    <select name="service_type" id="service_type" class="form-control" required>
                        <option value="consultation">Консультація</option>
                        <option value="policy">Оформлення полісу</option>
                        @if($insurances->count() > 0)
                            <option value="compensation">Отримання компенсації</option>
                        @endif
                    </select>
                </div>

                <div id="insurance_type_field" class="mb-3" style="display: none;">
                    <label for="insurance_type" class="form-label">Тип страхування</label>
                    <select id="insurance_type" name="insurance_type" class="form-control">
                        @foreach($insuranceTypes as $insuranceType)
                            <option value="{{ $insuranceType->id }}">{{ $insuranceType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="insurance_id_field" class="mb-3" style="display: none;">
                    <label for="insurance_id" class="form-label">Поліс</label>
                    <select id="insurance_id" name="insurance_id" class="form-control">
                        @foreach($insurances as $insurance)
                            <option value="{{ $insurance->id }}">{{ $insurance->insuranceType->name }}
                                - {{ $insurance->start_date}}/{{ $insurance->end_date }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3" id="additional_fields" style="display: none;">
                    {{-- JS додасть поля сюди --}}
                </div>

                <div class="mb-3">
                    <label for="document" class="form-label">Документ, уточнующій вашу особу</label>
                    <input type="file" id="document" name="document" class="form-control">
                </div>
                <div class="form-group">
                    <input type="checkbox" name="agree" id="agree" required>
                    <label for="agree">Я погоджуюся з <a href="/terms">умовами страхування</a> та <a href="/privacy">політикою
                            конфіденційності</a>.</label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Відправити заявку</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const serviceTypeSelect = document.getElementById('service_type');
            const insuranceTypeSelect = document.getElementById('insurance_type');
            const insuranceTypeField = document.getElementById('insurance_type_field');
            const insuranceIdField = document.getElementById('insurance_id_field');
            const additionalFieldsContainer = document.getElementById('additional_fields');

            serviceTypeSelect.addEventListener('change', function () {
                const selectedValue = this.value;

                insuranceTypeField.style.display = 'none';
                insuranceIdField.style.display = 'none';
                additionalFieldsContainer.style.display = 'none';

                if (selectedValue === 'policy') {
                    insuranceTypeField.style.display = 'block';
                } else if (selectedValue === 'compensation') {
                    insuranceIdField.style.display = 'block';
                }

                clearAdditionalFields();
            });

            insuranceTypeSelect.addEventListener('change', function () {
                const selectedValue = this.value;

                clearAdditionalFields();

                const insuranceTypes = {!! json_encode($insuranceTypes) !!};
                const selectedInsuranceType = insuranceTypes.find(type => type.id == selectedValue);

                if (selectedInsuranceType && selectedInsuranceType.additional_fields) {
                    additionalFieldsContainer.style.display = 'block';

                    const additionalFieldsArray = JSON.parse(selectedInsuranceType.additional_fields);

                    additionalFieldsArray.forEach(field => {
                        const label = document.createElement('label');
                        label.textContent = field;
                        label.className = 'form-label';

                        const input = document.createElement('input');
                        input.type = 'text';
                        input.name = 'additional_fields[]';
                        input.className = 'form-control';

                        // Добавить созданные элементы в контейнер
                        additionalFieldsContainer.appendChild(label);
                        additionalFieldsContainer.appendChild(input);
                    });
                } else {
                    additionalFieldsContainer.style.display = 'none';
                }
            });

            function clearAdditionalFields() {
                additionalFieldsContainer.innerHTML = '';
            }
        });

    </script>
@endsection
