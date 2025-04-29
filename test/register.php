<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="login">
        <form action="signup.php" method="post" enctype="multipart/form-data">
            <label>Фамилия</label>
            <input type="text" name="lastname" placeholder="Введите свою фамилию">
            <label>Имя</label>
            <input type="text" name="firstname" placeholder="Введите свое имя">
            <label>Отчество</label>
            <input type="text" name="surname" placeholder="Введите свое отчество">
            <label>Логин</label>
            <input type="text" name="login" placeholder="Введите свой логин">
            <label>Пароль</label>
            <input type="password" name="password" placeholder="Введите пароль">
            <label>Подтверждение пароля</label>
            <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
            <button type="submit">Зарегистрировать пользователя</button>

            <?php
            if (!empty($_SESSION['message']) && $_SESSION['message'] == 'Пароль введен некорркетно!' || $_SESSION['message'] == 'Логин введен некорректно!' || $_SESSION['message'] == 'Пользователь существует!' || $_SESSION['message'] == 'Неверный логин или пароль!' || $_SESSION['message'] == 'Имя введено некорректно!') {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                unset($_SESSION['message']);
            }
            unset($_SESSION['message']);
            ?>

        </form>
    </div>
    <footer>
        (с) Kenchadze, Nekrasov IU4-81, 2021
    </footer>

</body>

</html>