<!DOCTYPE html>
<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<html>
    <h1>Formulário de cadastro</h1>
    <hr>

    <?php $form = ActiveForm::begin() ?>

    <?=$form->field($model, 'name')?>
    <?=$form->field($model, 'email')?>
    <?=$form->field($model, 'idade')?>

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end() ?>

</html>