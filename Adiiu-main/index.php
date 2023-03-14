<?php
require_once __DIR__ . "/head.php";
require_once __DIR__ . "/views/header.php";
?>

<body class="mainBody">
    <div class="container homeContainer">
        <div class="row">
            <div class="col-lg-6">
                <img src="./imgs/homeDog1.png" height="300px">
            </div>
            <div class="col-lg-6 homeText">
                <h1>Know more about dogs!</h1>
                <h3>In our general dog breeds data page, with charts and interesting information of the most popular and known breeds.</h3>
                <button id="generalButton" onclick="redirect('/Adiiu/views/general.php')">Take a look!</button>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-6 homeText">
                <h1>Compare dog breeds</h1>
                <h3>With our new dog breed comparer tool, so you can choose between those breeds you are doubting on.</h3>
                <button id="compareButton" onclick="redirect('/Adiiu/views/compare.php')">Try it now!</button>
            </div>
            <div class="col-lg-6 homeImg">
                <img src="./imgs/homeDog2.png" height="300px">
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <img src="./imgs/homeDog3.png" height="300px">
            </div>
            <div class="col-lg-6 homeText">
                <h1>Get to know your favourite dog breed better!</h1>
                <h3>Select your favourite dog breed and check its features comparing them to the others dogs' breeds' features.</h3>
                <button id="favouriteButton" onclick="redirect('/Adiiu/views/favourite.php')">Take a look!</button>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#headerTitle').text("Welcome to the Dog Breeds Data Dashboard");
        $('#headerImg').attr("src", "./imgs/homeDog0.png");
    });
</script>