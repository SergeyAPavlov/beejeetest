<form method="POST" action="/auth" >
    <table class="table">
        <tr>
            <td></td>
            <td><?= $message ?></td>

        <tr>
        <tr>
            <td>Логин</td>
            <td><input name="login" type="text"></td>

        <tr>
            <td>Пароль</td>
            <td><input name="password" type="password"><br></td>
        </tr>

        <tr>
            <td></td>
            <td><input name="submit" type="submit" value="Войти"></td>
        </tr>
    </table>
</form>