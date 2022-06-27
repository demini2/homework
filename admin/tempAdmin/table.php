<?php
/**
 * @var $arr
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Тег table</title>
</head>
<body>
<table border="4">

        <th>title</th>
        <th>content</th>

    <?php for ($i=0; $i<count($arr)-1; $i=$i+2){?>
    <tr>
        <th><?= $arr[$i]?></th>
        <th><?= $arr[$i+1]?></th>
    </tr>
    <?php } ?>

</table>
</body>
</html>
