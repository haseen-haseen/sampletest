<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $projects app\models\Project[] */

$this->title = 'Manager Dashboard';
?>

<h1><?= Html::encode($this->title) ?></h1>

<h2>Project List</h2>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projects as $project): ?>
            <tr>
                <td><?= Html::encode($project->id) ?></td>
                <td><?= Html::encode($project->title) ?></td>
                <td><?= Html::encode($project->description) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
