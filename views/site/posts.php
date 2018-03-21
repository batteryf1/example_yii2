<?php

/* @var $this yii\web\posts */

$this->title = 'Статьи';

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
            <h2><a href="<?= Url::toRoute(['view', 'id' => $article->id]) ?>"><?= $article->title; ?></a></h2>

            <h2>
                <a href="<?= Url::toRoute(['category', 'id' => $article->category->id]) ?>"><?= $article->category->title; ?></a>
            </h2>

            <p><?= $article->description; ?></p>
        </div>
    </div>
<?php endforeach; ?>


