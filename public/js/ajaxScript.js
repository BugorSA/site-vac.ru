$('#send').click(function () {
    var price = document.getElementsByName("price");
    var provider = document.getElementsByName("provider")
    var fran = document.getElementsByName("fran")
    var comment = document.getElementsByName("comment");
    var comment2 = document.getElementsByName("comment2");
    $.ajax({
        type: 'POST',
        url: '/second', //обращаемся к обработчику
        data: {
            name: $('#name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            area: $('#select').val(),
            areaAn: $('#nameArea').val(),
            price: price,
            provider: provider,
            fran: fran,
            comment: comment,
            comment2: comment2,
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
