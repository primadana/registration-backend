<?php

namespace app\controllers;

class RegistrationController extends \yii\web\Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['verbs'] = [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'save-registration' => ['post', 'options']
                ],
            ];

        return $behaviors;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSaveRegistration(){
        return 'Registration';
    }

}
