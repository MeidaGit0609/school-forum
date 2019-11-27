<?php
require_once '../includes/head.php';
require_once '../includes/header.php';
require_once '../includes/footer.php';
get_head();
get_header();
?>

<div class="container">

    <h1>Регистрация</h1>
    <?php if($_GET['registr'] == 'code'): // Ввод кода подтверждения ?>
        <form action="/php/actions/email-code-action.php" method="post" class="form-group row alert alert-dark">
            <?=$_GET['registr'] == 'happy' ? '<div class="alert alert-success">Вы зарегистрированы!!</div>' : ''?>
            <?=$_GET['registr'] == 'code_fail' ? '<div class="alert alert-danger">Код введён неверно</div>' : ''?>
            <input type="text" name="code" class="form-control col-8">
            <button type="submit" name="enter" class="btn btn-primary">Отправить</button>
        </form>
    <?php else: ?>
        <form action="/php/actions/registr-action.php" method="post" class="form-group alert alert-dark">
            <?=$_GET['registr'] == 'happy' ? '<div class="alert alert-success">Вы зарегистрированы!!</div>' : ''?>

            <?=$_GET['registr'] == 'big-name' ? '<div class="alert alert-danger">Имя слишком длинное</div>' : ''?>
            <?=$_GET['registr'] == 'code-fail' ? '<div class="alert alert-danger">Не удалось отпраить код подтверждения на вашу почту</div>' : ''?>

            <input type="text" name="name" class="form-control mb-4" placeholder="Ваше имя" required>

            <?=$_GET['registr'] == 'email-fail' ? '<div class="alert alert-danger">Электронная почта введена неверно</div>' : ''?>

            <input type="email" class="form-control mb-4" name="email" placeholder="Ваша электроная почта" required>

            <?=$_GET['registr'] == 'mini-password' ? '<div class="alert alert-danger">Пароль слишком короткий</div>' : ''?>
            <?=$_GET['registr'] == 'big-password' ? '<div class="alert alert-danger">Пароль слишком длинный</div>' : ''?>

            <input type="password" class="form-control mb-4" name="password" placeholder="Ваш пароль" required>
            <?=$_GET['registr'] == 'password-repeat_fail' ? '<div class="alert alert-danger">Пароли не совпадают</div>' : ''?>
            <input type="password" class="form-control mb-4" name="password-repeat" placeholder="Повторите ваш пароль" required>

            <?=$_GET['registr'] == 'age-fail' ? '<div class="alert alert-danger">Ошибка</div>' : ''?>

            <label for="">
                Год рождение
                <select name="age" class="mb-4" required>
                    <?php for($i = 1920;$i < date('Y');$i++): ?>
                        <option value="<?=$i ?>"><?=$i ?></option>
                    <?php endfor; ?>
                </select>
            </label>

            <br>
            <label for="">
                Пол:
                <select name="gender" id="" required>
                    <option value="Мужской">Мужской</option>
                    <option value="Женский">Женский</option>
                </select>
            </label>
            <?=$_GET['registr'] == 'gender-fail' ? '<div class="alert alert-danger">Ошибка</div>' : ''?>
            <br>

            <button class="btn btn-success mt-2 mb-2" name="enter" type="submit">Зарегистрироваться</button>
            <br>
            Зарегистрированы? <a href="/pages/auth">войти</a>
        </form>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
