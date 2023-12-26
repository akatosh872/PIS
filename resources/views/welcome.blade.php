@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container">
            <img src="{{ asset('banners/banner1.jpg') }}" width="1024px" height="670px">

            <h1>Страхуйте своє життя та майно з нами!</h1>
            <p>Ми - надійна страхова компанія, яка пропонує широкий спектр послуг для фізичних та юридичних осіб. Ми дбаємо про вашу безпеку та комфорт, тому ми гарантуємо швидку та чесну виплату страхових сум у разі настання страхового випадку.</p>
            <div class="alert alert-info">
                <strong>Акція!</strong> Оформіть поліс КАСКО до 31 грудня та отримайте знижку 10%!
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
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus class="form-control">
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
