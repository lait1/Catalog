
document.getElementsByClassName('form__button-catalog')[0].onclick = function() {

    var xhr = new XMLHttpRequest();

    var message = new FormData(document.forms.category);

    xhr.open('POST', 'http://catalog.local/add/category', false);
    xhr.send(message);


    if (xhr.status != 200) {
        // обработать ошибку
        alert( xhr.status + ': ' + xhr.statusText );
    } else {
        // вывести результат
        //Вызывался popup с ответом.
        document.forms.category.reset();
        var messageElem = document.createElement('div');
        messageElem.appendChild(document.createTextNode(xhr.responseText));
        document.getElementById('add_category').appendChild(messageElem);
        // alert( xhr.responseText ); // responseText -- текст ответа.
    }
};

document.getElementsByClassName('form__button-goods')[0].onclick = function() {

    var xhr = new XMLHttpRequest();

    var message = new FormData(document.forms.goods);

    xhr.open('POST', 'http://catalog.local/add/goods', false);
    xhr.send(message);


    if (xhr.status != 200) {
        // обработать ошибку
        alert( xhr.status + ': ' + xhr.statusText );
    } else {
        // вывести результат
        //Вызывался popup с ответом.
        document.forms.goods.reset();
        var messageElem = document.createElement('div');
        messageElem.appendChild(document.createTextNode(xhr.responseText));
        document.getElementById('add_goods').appendChild(messageElem);
        // alert( xhr.responseText ); // responseText -- текст ответа.
    }
};