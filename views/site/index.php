<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<head>
    <style>
        .welcome-text {
    font-family: 'Playfair Display', serif; /* A stylish font, can be changed */
    font-size: 3em; /* Makes the text larger */
    color: #4A90E2; /* A beautiful color, adjust to fit the website theme */
    text-align: center; /* Centers the text */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Adds a subtle shadow for depth */
    margin-top: 20px; /* Space from top */
    animation: fadeIn 2s ease-in-out; /* Adds a fade-in animation */
}

/* Fade-in animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px); /* Start slightly above */
    }
    to {
        opacity: 1;
        transform: translateY(0); /* End at the original position */
    }
}

        </style>
</head>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <br>
        <br>
        <br>
        <br>
        <br>

        <h1 class="display-4 welcome-text">Welcome To  The site!</h1>


    </div>

  
</div>
