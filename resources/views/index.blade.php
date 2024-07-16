<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-do app</title>
    @vite(['resources/sass/main.scss', 'resources/js/app.js', 'resources/js/main.js'])
</head>

<body>
    <div class="container">
        <h1>Приложение для создания задач</h1>
        <form class="create-form" method="POST" action="{{ route('tasks.store') }}">
            <input type="text" name="name" placeholder="Задача...">
            <button type="submit">
                Создать
            </button>
        </form>
        <div class="tasks">
            @foreach ($tasks as $task)
                <div data-id="{{ $task->id }}" class="task  {{ $task->status == 'close' ? 'completed' : '' }}">
                    <input {{ $task->status == 'close' ? 'checked' : '' }} type="checkbox" name="task-"{{ $task->id }}" id="task-"{{ $task->id }}" class="task-status">
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
</body>

</html>
