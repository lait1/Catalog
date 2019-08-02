<?php var_dump($data);
?>
<h1>Тыгы-дык</h1>
<form id="login" class="main_form" >
    <label for="login">Имя пользователя</label><br>
    <input type="text" name="login" id="login" required><Br>

    <label for="password">Пароль</label><br>
    <input type="password" name="password" id="password" required><Br>

    <button class="form__button-login" type="button" >add</button>
</form>
<br>
<form name="registr" id="registration"  >
    <label for="user_name">User name</label><br>
    <input type="text" name="user_name" id="user_name" required><Br>

    <label for="login">Login</label><br>
    <input type="text" name="login" id="login" required><Br>

    <label for="password">Пароль</label><br>
    <input type="password" name="password" id="password" required><Br>

    <button class="form__button-reg" type="button" >add</button>
</form>
<br>
<form name="category" id="add_category" >
    <label for="category">Category</label><br>
        <input type="text" name="name_category" id="category" required><Br>

    <label for="desc">Описание</label><br>
        <textarea name="desc" id="desc"></textarea><br>

    <button class="form__button-catalog" type="button" >add</button>
</form>
<br>
<form name="goods"  id="add_goods" >
    <label for="good">Good</label><br>
        <input type="text" name="name_goods" id="good" required><Br>

    <label for="desc">Описание</label><br>
        <textarea  name="desc" ></textarea><br>
    <label for="amount">Кол-во</label><br>
        <input type="number" name="amount" ><br>
    <button class="form__button-goods" type="button" >add</button>
</form>
<div id="content"></div>