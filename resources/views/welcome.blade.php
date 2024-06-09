@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4">Ласкаво просимо до Страхування!</h1>
                <p class="lead">Ми готові забезпечити надійний захист для вас та вашого майна.</p>
                <hr class="my-4">
                <p>Оберіть найкращий страховий продукт, який відповідає вашим потребам.</p>
            </div>

            <h1>Страхуйте своє життя та майно з нами!</h1>
            <p>Ми - надійна страхова компанія, яка пропонує широкий спектр послуг для фізичних та юридичних осіб. Ми дбаємо про вашу безпеку та комфорт, тому ми гарантуємо швидку та чесну виплату страхових сум у разі настання страхового випадку.</p>
            <div class="alert alert-info">
                <strong>Акція!</strong> Оформіть поліс КАСКО до 31 грудня та отримайте знижку 10%!
            </div>

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

            @auth
            <form action="{{ route('claim.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="type">Виберіть тип страхування:</label>
                    <select name="type" id="type" required>
                        <option value="">--Виберіть тип страхування--</option>
                        <option value="auto">Авто</option>
                        <option value="property">Майно</option>
                        <option value="life">Життя</option>
                        <option value="health">Здоров'я</option>
                        <option value="travel">Подорожі</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Введіть ваше ім'я:</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="phone">Введіть ваш номер телефону:</label>
                    <input type="text" name="phone" id="phone">
                </div>
                <div class="form-group">
                    <label for="email">Введіть ваш email:</label>
                    <input type="text" name="email" id="email">
                </div>
                <button type="submit">Оформити поліс</button>
            </form>
            @endauth
            @guest
                <form method="POST" action="{{ url('/registration') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Ім'я</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Електронна пошта</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" id="password" name="password" required class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Підтвердження паролю</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Зареєструватися</button>
                </form>
            @endguest

            <p>Якщо у вас є питання або ви хочете отримати консультацію, зв'яжіться з нами за телефоном +38 (050) 123-45-67 або напишіть нам на email info@insurance.com.</p>
            <p>Ми працюємо для вас з 9:00 до 18:00 з понеділка по п'ятницю.</p>
        </div>
    </div>


@endsection
