<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">

        <h1>Feed de noticias via rest api</h1>

        <?php foreach($data as $row): ?>
            <h3>Titulo: <?=$row['title']?></h3>
            <p><i>ID: <?=$row['id']?></i></p>
            <p><?=$row['text']?></p>
            <p><i>Status: <?=$row['status']?></i></p>
        <?php endforeach; ?>

    </div>
</div>
