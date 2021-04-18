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

        <?php if(count($errors)):?>
            <h3><?=$errors['error']?></h3>

        <?php elseif(! count($data)):?>
            <h3>Nenhum dados encontrado ou api não conectada</h3>
        <?php endif;?>

    </div>
</div>
