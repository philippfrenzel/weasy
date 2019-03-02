<?php

namespace app\controllers;

use yii\helpers\Yii;
use yii\base\Action;
use yii\web\Controller;
use yii\web\Response;
use yii\exceptions\InvalidConfigException;
use app\models\LoginForm;

class ApiController extends Controller
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
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                '__class' => \yii\web\filters\VerbFilter::class,
                'actions' => [
                    'login' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function afterAction($action, $result)
    {
        $result = parent::afterAction($action, $result);
        $result['token'] = Yii::getApp()->request->csrfToken;
        return $this->asJson($result);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        $model->load(Yii::getApp()->request->post(), '');
        if ($model->login()) {
            return ['result' => 'success', 'user_id' => Yii::getApp()->user->getId()];
        } else {
            return ['result' => 'error', 'messages' => $model->getFirstErrors()];
        }
    }
}
