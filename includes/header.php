<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/functions/menu_functions.php';

function get_header() {
    global $config;
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <a class="navbar-brand" href="/pages/"><?=$config['logo'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php $nav_items = get_menu_items(); ?>

                <?php if(!isset($_COOKIE['user'])):  // Не зарегистрирован?>
                    <?php foreach($nav_items as $nav_item): ?>
                        <?php if($nav_item['access'] == 2): ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?=$nav_item['link'] ?>"><?=$nav_item['title'] ?></a>
                            </li>

                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>


                <?php if(isset($_COOKIE['user'])):  // Зарегистрирован?>
                    <?php foreach($nav_items as $nav_item): ?>
                        <?php if($nav_item['access'] == 1): ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?=$nav_item['link'] ?>"><?=$nav_item['title'] ?></a>
                            </li>

                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php foreach($nav_items as $nav_item): // Всем?>
                    <?php if($nav_item['access'] == 0): ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?=$nav_item['link'] ?>"><?=$nav_item['title'] ?></a>
                        </li>

                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </nav>
<?php } ?>



<!--<nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--    <a class="navbar-brand" href="#">Navbar</a>-->
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->
<!--    <div class="collapse navbar-collapse" id="navbarNav">-->
<!--        <ul class="navbar-nav">-->
<!--            --><?php //$nav_items = get_menu_items(); ?>
<!---->
<!--            --><?php //if(!isset($_COOKIE['user'])):  // Не зарегистрирован?>
<!--                --><?php //foreach($nav_items as $nav_item): ?>
<!--                    --><?php //if($nav_item['access'] == 2): ?>
<!---->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" href="--><?//=$nav_item['link'] ?><!--">--><?//=$nav_item['title'] ?><!--</a>-->
<!--                        </li>-->
<!---->
<!--                    --><?php //endif; ?>
<!--                --><?php //endforeach; ?>
<!--            --><?php //endif; ?>
<!---->
<!---->
<!--            --><?php //if(isset($_COOKIE['user'])):  // Зарегистрирован?>
<!--                --><?php //foreach($nav_items as $nav_item): ?>
<!--                    --><?php //if($nav_item['access'] == 1): ?>
<!---->
<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link" href="--><?//=$nav_item['link'] ?><!--">--><?//=$nav_item['title'] ?><!--</a>-->
<!--                        </li>-->
<!---->
<!--                    --><?php //endif; ?>
<!--                --><?php //endforeach; ?>
<!--            --><?php //endif; ?>
<!---->
<!--            --><?php //foreach($nav_items as $nav_item): // Всем?>
<!--                --><?php //if($nav_item['access'] == 0): ?>
<!---->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link" href="--><?//=$nav_item['link'] ?><!--">--><?//=$nav_item['title'] ?><!--</a>-->
<!--                    </li>-->
<!---->
<!--                --><?php //endif; ?>
<!--            --><?php //endforeach; ?>
<!--        </ul>-->
<!--    </div>-->
<!--</nav>-->