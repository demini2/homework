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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container-fluid">
<form name="test" method="get" action="/">
    <article style="border: 5px dotted #c68a5d; margin-bottom: 30px;">
        <h2><?= $data[0]->getTitle(); ?></h2><br>
        <p><?= $data[0]->getContent() ?></p>
    </article>


</form>
</div>
</body>
</html>



