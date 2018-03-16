$('#catalog').dcAccordion({
    speed: 350//скорость открытия вложений
});


    function showCart(cart) {
        $('#cart .modal-body') .html(cart);
        $('#cart') .modal();
    }


    function getCart(){
        $.ajax({
            url: '/cart/show',
            type: 'GET',
            success: function(res) {
                if(!res) alert('Ошибка');
                showCart(res);
            },
            error: function (){
                alert('Error');
            }
        });
        return false;
}


    $('#cart .modal-body').on('click', '.del-item',function () {
        var id = $(this).data('id');
        console.log(id);
        $.ajax({
            url: '/cart/del-item',
            data: {id: id},
            type: 'GET',
            success: function(res) {
                if(!res) alert('Ошибка');
                showCart(res);
            },
            error: function (){
                alert('Error');
            }
        });
        })

    function clearCart() {
        $.ajax({
            url: '/cart/clear',
            type: 'GET',
            success: function(res) {
                if(!res) alert('Ошибка');
                showCart(res);
            },
            error: function (){
                alert('Error');
            }
        });
    }

$('.add-to-cart')/*добавляем класс*/.on('click', function (e) {/*прикрепляем событие 'click'*/
    e.preventDefault();/*отмена дефолтного поведения(переход по ссылке отменен*/
    var id /*получаем id товара*/ = $(this).data('id'),
        qty = $('#qty').val();/*из текущего элемента получаем атрибутом data-id*/
    $.ajax({
        url: '/cart/add',//прописывает назначение url
        data: {id: id, qty: qty},//данные передаваеммые, передаем id на сервер полученный из data-id
        type: 'GET',//способ передачи на сервер
        success: function(res) {//принимаемый ответ записываем в res
            if(!res) alert('Ошибка');
            // console.log(res);//выводим res
            showCart(res);
        },
        error: function (){// если чето поломается
            alert('Error');//выводим ошибка
        }
    });
});