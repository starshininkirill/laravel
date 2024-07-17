import $ from 'jquery';

$('.task-status').on('change', function () {
    let th = $(this)
    let task = $(this).closest('.task')
    let id = task.data('id')

    let checked = $(this).is(':checked')
    let name = task.find('.name').text()
    let data = {}

    if (checked) {
        data = {
            'name': name,
            'status': 'close'
        }
    } else {
        data = {
            'name': name,
            'status': 'open'
        }
    }

    $.ajax({
        data: data,
        type: 'PUT',
        url: `http://127.0.0.1:8000/api/tasks/${id}`,
        success: function (reponse) {
            let status = reponse.status
            if (status == 'open') {
                task.removeClass('completed')
            } else {
                task.addClass('completed')
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Ошибка удаления задачи')
        }
    });
})

$('.task .delete').on('click', function () {
    let task = $(this).closest('.task')
    let id = task.data('id')
    $.ajax({
        type: 'DELETE',
        url: `http://127.0.0.1:8000/api/tasks/${id}`,
        success: function (reponse) {
            task.remove()
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Ошибка удаления задачи')
        }
    });
})

$('.create-form').submit(function (e) {
    e.preventDefault();

    let taskWrapper = $('.tasks')

    let formData = $(this).serializeArray();
    let name = formData[0].value;

    let data = {
        'name': name,
        'status': 'open'
    }

    $.ajax({
        data: data,
        type: 'POST',
        url: `http://127.0.0.1:8000/api/tasks/`,
        success: function (reponse) {
            let name = reponse['data']['name'];
            let id = reponse['data']['id']
            let newTask = createTask(name, id)
            taskWrapper.prepend(newTask)
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (errorThrown == 'Unprocessable Content') {
                alert('Заполните все поля')
            } else {
                alert(errorThrown)
                console.log(errorThrown);
                console.log(textStatus);
                console.log(jqXHR);
            }
        }
    });
})

function createTask(name, id) {
    return `
        <div data-id="{{ $task->id }}" class="task">
            <input type="checkbox" name="task-"${id}" id="task-"${id}" class="task-status">
            <div class="name">
                ${name}
            </div>
            <div class="delete">
                <svg xmlns="http://www.w3.org/2000/svg" id="Bold" viewBox="0 0 24 24" width="512"
                    height="512">
                    <path
                        d="M14.121,12,18,8.117A1.5,1.5,0,0,0,15.883,6L12,9.879,8.11,5.988A1.5,1.5,0,1,0,5.988,8.11L9.879,12,6,15.882A1.5,1.5,0,1,0,8.118,18L12,14.121,15.878,18A1.5,1.5,0,0,0,18,15.878Z" />
                </svg>
            </div>
        </div>
    `
}