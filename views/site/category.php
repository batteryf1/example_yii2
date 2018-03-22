<?php

//Update SEO tags
foreach ($articles as $article){
    $this->title = $article->title;

    $this->registerMetaTag(['name' => 'description', 'content' => $article->description]);

    $this->registerMetaTag(['name' => 'keyword', 'content' => $article->keyword]);
}
//I use to create Route
use yii\helpers\Url;

?>

<style>
    .col-lg-4{
        border: 1px solid;
    }
</style>

    <?php foreach ($articles as $article):?>
    <div class="row">
        <div class="col-lg-4"><?= $article->title ?></div>
        <div class="col-lg-4"><?= $article->content ?></div>
        <a class="col-lg-4" href="<?= Url::toRoute(['site/view', 'id' => $article->id]) ?>">Перейти на пост</a>
    </div>
    <?php endforeach; ?>