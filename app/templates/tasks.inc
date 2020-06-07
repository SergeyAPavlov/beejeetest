<h3>Список задач</h3>
<h4 style="text-align: right"><a href="/auth">Авторизация</a></h4>

    <table class="table">
        <tr>
            <th>&nbsp;</th>
            <th>Имя пользователя</th>
            <th>email</th>
            <th>Текст задачи</th>
            <th>Статус</th>
            <th>Отредактировано администратором</th>

        </tr>
        <tr>
            <th>Сортировать:</th>
            <td><a href="/?order=username">по возрастанию</a> | <a href="/?order=username&sort=desc">по убыванию</a></td>
            <td><a href="/?order=email">по возрастанию</a> | <a href="/?order=email&sort=desc">по убыванию</a></td>
            <td></td>
            <td><a href="/?order=status">по возрастанию</a> | <a href="/?order=status&sort=desc">по убыванию</a></td>
            <td></td>
        </tr>

            <?php  foreach ($tasks as $task) {  ?>
        <tr>
            <td>&nbsp;</td>
            <td><?= $task['username'] ?></td>
            <td><?= $task['email'] ?></td>
            <td><?= $task['text'] ?></td>
            <td><?= $task['status'] ?></td>
            <td><?= $task['edited'] ?></td>
        </tr>
            <?php  }  ?>

    </table>

<h4 style="text-align: center"> <?= $pages ?> </h4>
<h4 style="text-align: right"><a href="/add">Новая задача</a></h4>