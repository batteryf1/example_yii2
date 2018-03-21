<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Статья</title>
</head>
<body>

<style>
    .col-lg-4{
        border: 1px solid;
    }
</style>

	<div class="container">
		<div class="row">

            <div class="col-lg-4">Оглавление</div>
            <div class="col-lg-4">Контент поста</div>
            <div class="col-lg-4">Категория</div>
		</div>
        <div class="row">
            <div class="col-lg-4"><?= $article->title ?></div>
            <div class="col-lg-4"><?= $article->content ?></div>
            <div class="col-lg-4"><?= $article->category->title ?></div>
        </div>
	</div>
</body>
</html>