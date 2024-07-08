<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>To-do app</title>
</head>
<body>
   <h1>Приложение для создания задач</h1>
   @foreach ($tasks as $task)
      <div class="task">
         {{ $task->name }}
      </div>   
   @endforeach
</body>
</html>