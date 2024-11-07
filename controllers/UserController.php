<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use yii\web\BadRequestHttpException;
use yii\filters\AccessControl;

class UserController extends Controller
{
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['signup', 'login'],
                        'roles' => ['?'], // Guests
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'roles' => ['@'], // Authenticated users
                    ],
                ],
            ],
        ];
    }

    // Signup action
    public function actionSignup()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->user->login($model);
            return $this->redirect(['site/index']); // Redirect to home or another page
        }

        return $this->render('signup', ['model' => $model]);
    }

    // Login action
    public function actionLogin()
{
    $model = new \yii\base\DynamicModel(['email', 'password']);
    $model->addRule(['email', 'password'], 'required');

    if ($model->load(Yii::$app->request->post())) {
        $user = User::findByEmail($model->email);
        if ($user && $user->validatePassword($model->password)) {
            Yii::$app->user->login($user);

            // Redirect based on user role to the DashboardController
            return $this->redirect(['dashboard/index']); // Redirect to the dashboard
        }
        $model->addError('email', 'Invalid email or password.');
    }

    return $this->render('login', ['model' => $model]);
}

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
