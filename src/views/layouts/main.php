<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\web\View;

AppAsset::register($this);

$this->beginPage() 

?>
<!DOCTYPE html>
<html lang="en<?= ""//Yii::$app->language ?>">
<head>
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons' rel="stylesheet">
    <meta charset="UTF-8<?= ""//(Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<v-app id="app">
    <Weasy></Weasy>
    <div v-if="this.$route.matched.length == 0">
        <?= $content ?>
    </div>
</v-app>
        

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
