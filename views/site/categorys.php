<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php foreach ($categorys as $category):?>
        <title><?= $category->title ?></title>
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

    <?php foreach ($categorys as $category):?>
        <div class="row">
            <div class="col-lg-3"><?= $category->title ?></div>
            <a class="col-lg-3" href="<?= Url::toRoute(['site/category', 'id' => $category->id]) ?>">Перейти в категорию</a>
            <div class="col-lg-3"><?= $category->description ?></div>
            <div class="col-lg-3"><?= $category->keyword ?></div>
        </div>
    <?php endforeach; ?>
</div>

<?php

//echo LinkPager::widget([
//    'pagination' => $pagination,
//]);
?>
</body>
</html>