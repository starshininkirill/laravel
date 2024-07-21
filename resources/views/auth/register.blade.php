@extends('base')

@section('main')
    <main>
        <form method="POST" action="{{ route('register.store') }}" class="rigister-form auth-form">
            @csrf
            <h2>Регистрация</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="input-group">
                <label for="">Логин</label>
                <input type="text" name="name" placeholder="User1234">
            </div>
            <div class="input-group">
                <label for="">Почта</label>
                <input type="email" name="email" placeholder="test@mail.ru">
            </div>
            <div class="input-group">
                <label for="">Пароль</label>
                <input type="password" name="password" placeholder="*****">
            </div>
            <div class="input-group">
                <label for="">Повторите пароль</label>
                <input type="password" name="password2" placeholder="*****">
            </div>
            <button type="submit" class="btn">
                Зарегистрироваться
            </button>
            <div class="login">
                Уже есть аккаунт? <a href="{{ route('login') }}">Войти</a>
            </div>
        </form>
    </main>
@endsection
 