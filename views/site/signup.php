<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;

?>


<div class="site-login container">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'signup-form',
        'options' => ['class' => 'form-horizontal'],
    ]); ?>
        <?= $form->field($model, 'fio')->textInput(['class'=>'form-control', 'placeholder'=>'Имя', 'autofocus' => true]) ?>
        <?= $form->field($model, 'username')->textInput(['class'=>'form-control', 'placeholder'=>'Логин']) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Пароль']) ?>
        <?= $form->field($model, 'email')->textInput(['class'=>'form-control', 'placeholder'=>'E-mail',]) ?>

        <div class="form-group text-center">
            <div>
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    <?php ActiveForm::end() ?>

    <?php if( Yii::$app->session->hasFlash('msgSignup') ): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('msgSignup'); ?>
        </div>
    <?php endif;?>
`    
</div>