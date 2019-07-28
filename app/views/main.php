<h1>Тыгы-дык</h1>
<form class="main_form" method="post" action="login">
    <label for="login">Имя пользователя</label><br>
    <input type="text" name="login" id="login" required><Br>

    <label for="password">Пароль</label><br>
    <input type="password" name="password" id="password" required><Br>

    <input type=submit value=Выбрать name="submit">
</form>
<br>
<form class="add_category" method="post" action="add/category">
    <label for="category">Category</label><br>
    <input type="text" name="category" id="category" required><Br>

    <label for="desc">Описание</label><br>
    <textarea name="desc" id="password"></textarea><br>

    <input type=submit value=Add name="submit">
</form>
<br>
<form class="add_goods" method="post" action="add/good">
    <label for="good">Good</label><br>
    <input type="text" name="good" id="good" required><Br>

    <label for="desc">Описание</label><br>
    <textarea  name="desc" id="password"></textarea><br>
    <label for="amount">Кол-во</label><br>
    <input type="number" name="amount" ><br>
    <input type=submit value=Add name="submit">
</form>
<div id="content"></div>