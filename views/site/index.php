<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';

use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <h3>Все посты. Каждый пост ведет на страницу отдельного поста или на страницу категории, где отображаются все посты из данной категории. Количество постов на этой странице специально 1, чтобы была возможность проверить пагинатор</h3>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

<!--        --><?php //foreach ($articles as $article) :?>
<!--            <div class="row">-->
<!--                <div class="col-lg-4">-->
<!--                    <h2><a href="--><?//= Url::toRoute(['site/view', 'id' => $article->id]) ?><!--">--><?//= $article->title;  ?><!--</a></h2>-->
<!---->
<!--                    <h2><a href="--><?//= Url::toRoute(['site/category', 'id' => $article->category->id]) ?><!--">--><?//= $article->category->title;  ?><!--</a></h2>-->
<!---->
<!--                    <p>--><?//= $article->description;  ?><!--</p>-->
<!--                </div>-->
<!--            </div>-->
<!--        --><?php //endforeach; ?>
<!---->
<!---->
<!--        --><?php
//        // display pagination
//        echo LinkPager::widget([
//            'pagination' => $pagination,
//        ]);
//        ?>


    </div>
</div>
