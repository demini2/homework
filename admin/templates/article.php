<?php
/**
 * @var $data
 */
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> tab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <br>
    <form name="test" method="get" action="/">
        <a href="/2.1/admin/?ctrl=index"> Главная</a>
    </form>
    <hr>
    <form name="red" method="post" action="article.php">
        <article style="border: 5px dotted #c68a5d; margin-bottom: 30px;">
            <?php foreach ($this->article as $content) { ?>
            <h2><?= $content->getTitle(); ?></h2><br>
            <p><?= $content->getContent() ?></p>
            <?php if (!empty($content->getAuthor())) { ?>
                <p>Автор статьи:</p>
                <p><?= $content->getAuthor() ?></p>
            <?php } ?>

        </article>

        <button class="btn btn-outline-dark" name="delete" value="<?= $content->getId() ?>"
                formaction="/2.1/admin/index.php"
                type="submit">Удалить
        </button>
    </form>
    <form name="red" method="post" action="article.php">
        <p><b>Новый заголовок</b><Br>
            <textarea class="form-control" name="newTitle" required maxlength="5000" cols="40" rows="3"></textarea>
        </p>
        <p><b>Текст новости</b><Br>
            <textarea class="form-control" name="newContent" required maxlength="5000" cols="40" rows="3"></textarea>
        </p>
        <button class="btn btn-outline-dark" name="update" value="<?= $content->getId() ?>"
                formaction="/2.1/admin/index.php"
                type="submit">Редактировать
        </button>
    </form>
    <?php } ?>
</div>
</body>
</html>



