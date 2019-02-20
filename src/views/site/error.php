<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */
use yii\helpers\Html;
$this->title = $name;
$this->subTitle = get_class($exception);

?>

<div class="exception">
    <?= nl2br(Html::encode($exception->getMessage())) ?>
</div>

<?php dump($exception) ?>