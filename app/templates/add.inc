<h3>Добавить новую задачу</h3>
<form method="POST" action="/add" >
    <table class="table">
        <tr>
            <td></td>
            <td><?= $message ?></td>

        <tr>
        <tr>
            <td>Имя пользователя</td>
            <td><input name="username" type="text"></td>

        <tr>
            <td>Емейл</td>
            <td><input name="email" type="text"><br></td>
        </tr>

        <tr>
            <td>Текст задачи</td>
            <td><input name="text" type="text"><br></td>
        </tr>

        <tr>
            <td></td>
            <td><input name="submit" type="submit" value="Создать"></td>
        </tr>
    </table>
</form>