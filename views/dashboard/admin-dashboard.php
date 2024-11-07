<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $users app\models\User[] */

$this->title = 'Admin Dashboard';
?>

<h1><?= Html::encode($this->title) ?></h1>

<h2>User List</h2>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= Html::encode($user->id) ?></td>
                <td><?= Html::encode($user->name) ?></td>
                <td><?= Html::encode($user->email) ?></td>
                <td><?= Html::encode($user->role) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
