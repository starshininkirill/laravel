@extends('base')

@section('main')
    <main>
        <form method="POST" action="{{ route('login.store') }}" class="login-form auth-form">
            @csrf
            <h2>Вход</h2>
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
                <label for="">Пароль</label>
                <input type="password" name="password" placeholder="*****">
            </div>
            <button type="submit" class="btn">
                Войти
            </button>
            <div class="login">
                Нет аккаунта? <a href="{{ route('register.index') }}">Зарегистрироваться</a>
            </div>
        </form>
    </main>
@endsection
