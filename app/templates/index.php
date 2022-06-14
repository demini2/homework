<?php
/**
 * @var $data
 */
?>
<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title> tabl</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container-fluid">
    <hr>
    <form name="test" method="get" action="/">
        <a href="/hlam/news2.php"> Новости</a>
        <a href="/hlam/entrance.php"> Главная</a>
    </form>
    <hr>
    <br>
    <form name="news" method="get" action="/">
        <?php
        foreach ($this->articles as  $article){ ?>
            <article style="border: 5px dotted #c68a5d; margin-bottom: 20px;">
                <h3><a href="/2.1/article.php?id=<?= $article->getId(); ?>"><?= $article->getTitle(); ?></a></h3>
            </article>


        <?php } ?>
    </form>
    <hr>
</div>
</body>
</html>
