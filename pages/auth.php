<?php
require_once '../includes/head.php';
require_once '../includes/head.php';
require_once '../includes/header.php';
require_once '../includes/footer.php';
get_head();
get_header();
?>

<div class="container">
    <div class="card card-primary">
        <div class="card-body">
            <h1>Авторизация</h1>
            <form action="/php/actions/auth-action.php" method="post" class="">
                <?=$_GET['auth'] == 'happy' ? '<div class="alert alert-success">Вы успешно авторизовались</div>' : '' ?>
                <?=$_GET['auth'] == 'error' ? '<div class="alert alert-danger">Ошибка</div>' : '' ?>
                <?=$_GET['auth'] == 'data_error' ? '<div class="alert alert-danger">Имя или пароль введены неверно</div>' : '' ?>
                <input type="text" name="name" class="form-control mb-2" placeholder="Ваше имя" required>
                <input type="password" class="form-control mb-2" name="password" placeholder="Ваш пароль" required>
                <button class="btn btn-success mb-2" name="enter" type="submit">Войти</button>
                <br>
                Не зарегистрированы? <a href="/pages/registr">зарегистрироваться</a>
            </form>
        </div>
    </div>



</div>

<?php get_footer(); ?>