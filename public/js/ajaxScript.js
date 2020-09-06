$('#send').click(function () {
    $.ajax({
        type: 'POST',
        url: '/second', //обращаемся к обработчику
        data: {
            name: $('#name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            area: $('#select').val(),
            areaAn: $('#nameArea').val()
        },
        success: function (data) {  //в случае успеха выводим результаты в div "results"
            $('#formx').remove(); //скрываем форму после отправки
            $('#results').html(data); //показываем сообщение об успехе вместо неё
        },
        error: function (xhr, str) { //ошибка выводит соответствующее сообщение
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    })
});