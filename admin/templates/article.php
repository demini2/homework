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
    <form name="red" method="post" action="article.php">
        <article style="border: 5px dotted #c68a5d; margin-bottom: 30px;">
            <h2><?= $data[0]->getTitle() ?></h2><br>
            <p><?= $data[0]->getContent() ?></p>
            <p></p>
        </article>

        <button class="btn btn-outline-dark" name="delete" value="<?= $data[0]->getId() ?>"
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
        <button class="btn btn-outline-dark" name="update" value="<?= $data[0]->getId() ?>"
                formaction="/2.1/admin/index.php"
                type="submit">Редактировать
        </button>
    </form>

</div>
</body>
</html>



