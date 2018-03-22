<?php

/* @var $this yii\web\view */

//Update SEO tags
$this->title = 'Все статьи';

$this->registerMetaTag(['name' => 'description', 'content' => 'Посты сайта']);

$this->registerMetaTag(['name' => 'keyword', 'content' => 'Ключевые слова']);

//I use to create Route
use yii\helpers\Url;

?>


<style>
    .col-lg-4 {
        border: 1px solid;
    }
</style>

<?php foreach ($articles as $article) : ?>
    <div class="row">
        <div class="col-lg-12">
            <h2><a href="<?= Url::toRoute(['view', 'id' => $article->id]) ?>">Название: <?= $article->title; ?></a></h2>

            <h2>
                <a href="<?= Url::toRoute(['category', 'id' => $article->category->id]) ?>">Категория: <?= $article->category->title; ?></a>
            </h2>

            <p>Описание: <?= $article->description; ?></p>
        </div>
    </div>
<?php endforeach; ?>


