$('#send').click(function () {
    var price = checkedValue1();
    var provider = checkedValue2();
    var fran = checkedValue3();
    var comment = document.getElementById("comment").value;
    var comment2 = document.getElementById("comment2").value;
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
        success: function () {  //в случае успеха выводим результаты в div "results"
            $('#send_div').hide(); //скрываем форму после отправки
            $('#result').show();
            $('#prevBtn').hide();
        },
        error: function (xhr, str) { //ошибка выводит соответствующее сообщение
            alert('Возникла ошибка: ' + xhr.responseCode);
            alert(str);
        }
    })
});

function checkedValue1() {
    var ch = document.getElementsByName('price');
    for (i = 0; i < ch.length; i++) {
        if (ch[i].checked)
            return ch[i].value;
    }
}
function checkedValue2() {
    var ch = document.getElementsByName('provider');
    for (i = 0; i < ch.length; i++) {
        if (ch[i].checked)
            return ch[i].value;
    }
}
function checkedValue3() {
    var ch = document.getElementsByName('fran');
    for (i = 0; i < ch.length; i++) {
        if (ch[i].checked)
            return ch[i].value;
    }
}
