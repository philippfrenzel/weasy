<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Yii;
use yii\app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use yii\app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
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
    <v-navigation-drawer app></v-navigation-drawer>
    <v-toolbar app></v-toolbar>
    <v-content>
        <v-container fluid>
        <router-view>
            <div v-if="this.$route.matched.length == 0">
                <?= $content ?>
            </div>
        </router-view>
        </v-container>
    </v-content>
    <v-footer app>
    
    </v-footer>
</v-app>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
