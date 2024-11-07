<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\User;
use app\models\Project;

class DashboardController extends Controller
{
    public function actionIndex()
    {
        // Get the current user's role
        $role = Yii::$app->user->identity->role;

        if ($role == 'admin') {
            // Admin can see the list of users
            $users = User::find()->all();
            return $this->render('admin-dashboard', ['users' => $users]);
        } elseif ($role == 'manager') {
            // Manager can see the list of projects
            $projects = Project::find()->all();
            return $this->render('manager-dashboard', ['projects' => $projects]);
        } else {
            // Redirect or show an error for users without proper access
            return $this->redirect(['site/index']);
        }
    }
}
