<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php foreach ($posts as $post):?>
        <title><?= $post->title ?></title>
    <?php endforeach; ?>

</head>
<body>

<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<style>
    .col-lg-3{
        border: 1px solid;
    }
</style>

<div class="container">

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

</div>

<?php

//echo LinkPager::widget([
//    'pagination' => $pagination,
//]);
?>

<?= LinkPager::widget([
    'pagination' => $pages,
]); ?>
</body>
</html>