<?php

namespace yii\app\controllers;

use yii\helpers\Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                '__class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage and all vue.js pages
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
