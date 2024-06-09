@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Види страховок</h2>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('insurance/auto.jpg') }}" class="card-img-top" alt="Автострахування">
                    <div class="card-body">
                        <h5 class="card-title">Автострахування</h5>
                        <p class="card-text">Захистіть своє авто від непередбачуваних ситуацій на дорозі.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('insurance/home.jpg') }}" class="card-img-top" alt="Страхування майна">
                    <div class="card-body">
                        <h5 class="card-title">Страхування майна</h5>
                        <p class="card-text">Захистіть своє майно від ризиків та небезпек.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('insurance/life.jpg') }}" class="card-img-top" alt="Страхування життя">
                    <div class="card-body">
                        <h5 class="card-title">Страхування життя</h5>
                        <p class="card-text">Забезпечте фінансову безпеку для ваших близьких у випадку непередбачуваних обставин.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('insurance/health.jpg') }}" class="card-img-top" alt="Медичне страхування">
                    <div class="card-body">
                        <h5 class="card-title">Медичне страхування</h5>
                        <p class="card-text">Забезпечте себе та свою сім'ю доступом до високоякісної медичної допомоги.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('insurance/travel.jpg') }}" class="card-img-top" alt="Страхування подорожей">
                    <div class="card-body">
                        <h5 class="card-title">Страхування подорожей</h5>
                        <p class="card-text">Безпечно та спокійно подорожуйте з найкращим страховим захистом.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
