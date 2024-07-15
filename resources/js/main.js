import $ from 'jquery';

$('.task .delete').on('click', function(){
    let task = $(this).closest('.task')
    let id = task.data('id')
    $.ajax({
        type:'DELETE', 
        url:`http://127.0.0.1:8000/api/tasks/${id}`,
        success: function (reponse) {
            alert('Задача удалена!')
            task.remove()
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Ошибка удаления задачи')
        }
    });
})