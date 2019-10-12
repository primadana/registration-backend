<?php

namespace app\controllers;
use Yii;
use yii\helpers\Json;
use app\models\UserRegisration;

class RegistrationController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                'Origin' => ['localhost', '*'],
                'Access-Control-Request-Method' => ['POST', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Max-Age' => '600',
            ],
        ];

        $behaviors['verbs'] = [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    'save-registration' => ['post', 'options']
                ],
            ];

        return $behaviors;
    }

    public function beforeAction($action)
    {
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionSaveRegistration(){
        //$params = json_decode(file_get_contents('php://input'), true);
        $params = json_decode(Yii::$app->request->getRawBody(), true);
        // var_dump($params['data']['email']); die();
        // return json_decode($params, true);
        $user = new UserRegisration;
        $user->email = $params['data']['email'];
        $user->first_name = $params['data']['first_name'];
        $user->last_name = $params['data']['last_name'];
        $user->full_name = $user->first_name.' '.$user->last_name;
        $user->date_of_birth = $params['data']['date'].'-'.$params['data']['month'].'-'.$params['data']['year'];
        $user->gender = $params['data']['gender'];
        $user->phone_number = $params['data']['phone_number'];
        if($user->save()){
            return 'true';
        }
        else{
            var_dump($user->errors);die;
        }
    }

}
