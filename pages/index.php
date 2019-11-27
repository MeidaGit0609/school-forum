<?php
require_once '../php/config.php';
require_once '../php/functions/categories_functions.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Страница

if($page > ceil(categories_count() / $itemOnePage) || $page < 1) {
    header('Location: 404.php');
}

require_once '../includes/head.php';
require_once '../includes/header.php';
require_once '../includes/footer.php';
get_head();
get_header();
?>

<div class="container">
    <?=$_COOKIE['user']
    ?>
    <div class="categories">
        <h1 class="categories__title mb-5">Категории:</h1>
        <?php
        $categories = get_categories($page); // Все категории
        foreach($categories as $category) :
        ?>
            <a class="categories__item" href="/pages/category.php?id=<?=(int)$category['id'] ?>">
                <div class="categories__left">
                    <h3 class="categories__name"><?=$category['title'] ?></h3>
                    <p class="categories__description"><?=mb_substr($category['description'], 0, 200, 'utf-8') . '...' ?></p>
                </div>

                <div class="categories__right">
                    <h4 class="categories__count">Количество постов: 4</h4>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="pagination">
<!--        Пагинация-->
        <?php if($page < 2) :?>

        <?php else : ?>
            <a href="?page=<?=$page - 1;?>" class="pageBtn mr-3">Предыдущая страница </a>
        <?php endif; ?>


        <?php
        $forLimit = categories_count() / $itemOnePage;
        $forLimit = ceil($forLimit);
        ?>

        <?php if($forLimit == 1) : ?>

        <?php else : ?>
            <?php for($i = 1; $i <= $forLimit;$i++) : ?>
                <a href="?page=<?=$i;?>" class="mr-2"><?=$i;?> </a>
            <?php endfor; ?>
        <?php endif; ?>


        <?php if($page == $forLimit || $page > $forLimit) :?>

        <?php else : ?>
            <a href="?page=<?=$page + 1;?>" class="pageBtn ml-3">Следующая страница</a>
        <?php endif; ?>


    </div>

</div>

<?php get_footer(); ?>
