<?php
require_once __DIR__ . "/../head.php";
require_once __DIR__ . "../header.php";
?>

<body class="mainBody">

    <div class="info">
        <h1> In this page you can see information and comparisons about the 10 most popular dog breeds of our Database.
            Enjoy!</h1>
    </div>

    <div class="container meuContainer">
        <div class="div1" id="chart1"></div>
        <div class="div2" id="chart2"></div>
        <div class="div3" id="chart3"></div>
        <div class="div4" id="chart4"></div>
        <div class="divImg" id="gifImg"></div>
    </div>

</body>

<script>
    $(document).ready(function() {
        $('#headerTitle').text("General info charts about dogs");
        $('#headerImg').attr("src", "./../imgs/generalDog.png");
        var data;
        getAllDogsData(function(response) {
            data = response;
        });

        popularDogsTop10 = get10PopularDogs(data);

        var dogsWeight = new Array();
        for (i = 0; i < popularDogsTop10.length; i++) {
            dogsWeight.push([popularDogsTop10[i].Breed, (parseInt(popularDogsTop10[i].min_weight) + parseInt(popularDogsTop10[i].max_weight)) / 2]);
        }

        var dogsHeight = new Array();
        for (i = 0; i < popularDogsTop10.length; i++) {
            dogsHeight.push([popularDogsTop10[i].Breed, (parseInt(popularDogsTop10[i].min_height) + parseInt(popularDogsTop10[i].max_height)) / 2]);
        }

        var dogsMaxExpectancy = new Array();
        for (i = 0; i < popularDogsTop10.length; i++) {
            dogsMaxExpectancy.push([popularDogsTop10[i].Breed, parseInt(popularDogsTop10[i].max_expectancy)]);
        }

        var dogsMinExpectancy = new Array();
        for (i = 0; i < popularDogsTop10.length; i++) {
            dogsMinExpectancy.push([popularDogsTop10[i].Breed, parseInt(popularDogsTop10[i].min_expectancy)]);
        }

        var dogsShedding = new Array();
        for (i = 0; i < popularDogsTop10.length; i++) {
            dogsShedding.push([popularDogsTop10[i].Breed, parseFloat(popularDogsTop10[i].shedding_value)]);
        }

        var breedNames = new Array();
        for (i = 0; i < popularDogsTop10.length; i++) {
            breedNames.push(popularDogsTop10[i].Breed);
        }


        // draw chart
        $('#chart1').highcharts({ //Mean Weight chart
            chart: {
                backgroundColor: '#FFF5EB',
                type: "column",
                borderColor: "#f1d4b2",
                borderRadius: 5,
                borderWidth: 5,

            },
            title: {
                text: "Mean Weight Comparison"
            },
            xAxis: {
                allowDecimals: false,
                title: {
                    text: "Breed"
                },
                categories: breedNames
            },
            yAxis: {
                title: {
                    text: "Kilograms"
                }

            },
            colors: [
                '#82A8D2', '#6AF9C4', '#058DC7', '#50B432', '#ED561B',
                '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263'
            ],
            series: [{
                data: dogsWeight,
                name: 'Dogs'
            }],
            credits: false
        });

        $('#chart2').highcharts({ // Mean Height chart
            chart: {
                backgroundColor: '#FFF5EB',
                type: "bar",
                borderColor: "#f1d4b2",
                borderRadius: 5,
                borderWidth: 5,

            },
            title: {
                text: "Mean Height Comparison"
            },
            xAxis: {
                allowDecimals: false,
                title: {
                    text: "Breed"
                },
                categories: breedNames
            },
            yAxis: {
                title: {
                    text: "Centimeters"
                }

            },
            colors: [
                '#82A8D2', '#6AF9C4', '#058DC7', '#50B432', '#ED561B',
                '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263'
            ],
            series: [{
                data: dogsHeight,
                name: 'Dogs'
            }],
            credits: false
        });

        $('#chart3').highcharts({ // Shedding Frequency chart
            chart: {
                backgroundColor: '#FFF5EB',
                type: "pie",
                borderColor: "#f1d4b2",
                borderRadius: 5,
                borderWidth: 5,

            },
            title: {
                text: "Shedding frequency (0 to 1)"
            },
            xAxis: {
                allowDecimals: false,
                title: {
                    text: "Breed"
                }
            },
            yAxis: {
                title: {
                    text: "Shedding value"
                }

            },
            colors: [
                '#82A8D2', '#6AF9C4', '#058DC7', '#50B432', '#ED561B',
                '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263'
            ],
            series: [{
                data: dogsShedding,
                name: 'Value'
            }],
            credits: false
        });


        $('#chart4').highcharts({ // Expectancies chart
            chart: {
                backgroundColor: '#FFF5EB',
                type: "areaspline",
                borderColor: "#f1d4b2",
                borderRadius: 5,
                borderWidth: 5,
            },
            title: {
                text: "Minimum and Maximum expectancies Comparison"
            },
            xAxis: {
                allowDecimals: false,
                title: {
                    text: "Breed"
                },
                categories: breedNames
            },
            yAxis: {
                title: {
                    text: "Years"
                }

            },
            colors: [
                '#ED561B', '#24CBE5', '#64E572',
                '#FF9655', '#FFF263'
            ],
            series: [{
                    data: dogsMaxExpectancy,
                    name: 'Maximum Expectancy'
                },
                {
                    data: dogsMinExpectancy,
                    name: 'Minimum Expectancy'
                }
            ],
            credits: false
        });
    });
</script>