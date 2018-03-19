<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Категория</title>
</head>
<body>

<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<style>
    .col-lg-4{
        border: 1px solid;
    }
</style>

<div class="container">
    <?php ?>

    <?php foreach ($articles as $article):?>
    <div class="row">
        <div class="col-lg-4"><?= $article->title ?></div>
        <div class="col-lg-4"><?= $article->content ?></div>
        <a class="col-lg-4" href="<?= Url::toRoute(['site/view', 'id' => $article->id]) ?>">Перейти на пост</a>
    </div>
    <?php endforeach; ?>
</div>
</body>
</html>