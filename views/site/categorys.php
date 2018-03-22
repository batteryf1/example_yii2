<?php
//I use to create Route
use yii\helpers\Url;

//Widget Pagination
use yii\widgets\LinkPager;
?>

<?php

//Update SEO tags

$this->title = 'Страница категорий';

$this->registerMetaTag(['name' => 'description', 'content' => 'Категории моего сайта']);

$this->registerMetaTag(['name' => 'keyword', 'content' => 'Ключевые слова']);

?>

<style>
    .col-lg-3{
        border: 1px solid;
    }
</style>

    <div class="row">
        <div class="col-lg-3">Название</div>
        <div class="col-lg-3">Ссылка</div>
        <div class="col-lg-3">Описание</div>
        <div class="col-lg-3">Ключевые слова</div>
    </div>

    <?php foreach ($posts as $post):?>
        <div class="row">
            <div class="col-lg-3"><?= $post->title ?></div>
            <a class="col-lg-3" href="<?= Url::toRoute(['category', 'id' => $post->id]) ?>">Перейти в категорию</a>
            <div class="col-lg-3"><?= $post->description ?></div>
            <div class="col-lg-3"><?= $post->keyword ?></div>
        </div>
    <?php endforeach; ?>

<?= LinkPager::widget([
    'pagination' => $pages,
]); ?>