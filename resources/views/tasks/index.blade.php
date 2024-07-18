@extends('index')

@section('main')
    <main>
        <div class="tasks-wrapper">
            <form class="create-form" method="POST" action="{{ route('tasks.store') }}">
                <input type="text" name="name" placeholder="Задача...">
                <button class="btn" type="submit">
                    Создать
                </button>
            </form>
            <div class="tasks">
                @foreach ($tasks as $task)
                    <div data-id="{{ $task->id }}" class="task  {{ $task->status == 'close' ? 'completed' : '' }}">
                        <input {{ $task->status == 'close' ? 'checked' : '' }} type="checkbox"
                            name="task-"{{ $task->id }}" id="task-"{{ $task->id }}" class="task-status">
                        <div class="name">
                            {{ $task->name }}
                        </div>
                        <div class="delete">
                            <svg xmlns="http://www.w3.org/2000/svg" id="Bold" viewBox="0 0 24 24" width="512"
                                height="512">
                                <path
                                    d="M14.121,12,18,8.117A1.5,1.5,0,0,0,15.883,6L12,9.879,8.11,5.988A1.5,1.5,0,1,0,5.988,8.11L9.879,12,6,15.882A1.5,1.5,0,1,0,8.118,18L12,14.121,15.878,18A1.5,1.5,0,0,0,18,15.878Z" />
                            </svg>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="categories-wrapper">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="category-create-form" method="POST" action="{{ route('category.store') }}">
                @csrf
                <input type="text" name="name" placeholder="Название категории...">
                <button class="btn" type="submit">
                    Создать
                </button>
            </form>
            @if(!empty($categories))
                <div class="categories">
                    <h2>Категории задач</h2>
                    <a href="{{ route('home') }}" class="category">
                        Все
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('category.show', $category->id)}}" class="category">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </main>
@endsection
