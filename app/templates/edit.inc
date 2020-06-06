<h3>Отредактировать задачу</h3>
<form method="POST" action="/add" >
    <table class="table">
        <tr>
            <td></td>
            <td><?= $message ?></td>

        <tr>
        <tr>
            <td>Имя пользователя</td>
            <td><input name="username" type="text" value="<?= $task->username ?>"></td>

        <tr>
            <td>Емейл</td>
            <td><input name="email" type="text" value="<?= $task->email ?>"><br></td>
        </tr>

        <tr>
            <td>Текст задачи</td>
            <td><input name="text" type="text" value="<?= $task->text ?>"><br></td>
        </tr>

        <tr>
            <td></td>
            <td><input name="submit" type="submit" value="Отредактировать"></td>
        </tr>
    </table>
</form>