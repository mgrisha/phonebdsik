$(function () {
    //вешаем обработчик на кнопку
    $("button").click(function() {
        //получаем имя кнопки
        var name = $(this).val();
        //добавляем имя кнопки для отпраки данных методом POST 
        var data = $("#data").val();
        data = name;

        //делаем кнопку красной
        $(this).toggleClass('btn-danger');
        //проверка кнопки на цвет, если красная, то удаляем ul, если зеленая то получаем данные с БД
        if (!$(this).hasClass('btn-danger')) {
            //выбираем ul для удаления
            $('#output').children('.' + name).remove();
        } else {
            //ajax запрос
            $.ajax({
                url: "display.php",
                type: "POST",
                data: {data: data},
                success: function(result) {                            
                    if(result) {
                        //добавляем методом append в div#output модели телефонов
                        $('#output').append(function () {
                            var res = '<ul class=' + name + '>';
                            for (var i = 0; i < result.phones.name.length; i++) {
                                res += '<li>' + result.phones.name[i] + '</li>';
                            }
                            res += '</ul>';
                            return res;
                        });
                    } else {
                        console.log(result.message);
                    }
                    return false;
                }
            });
        }
    });
});