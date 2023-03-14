<?php
require_once __DIR__ . "/../head.php";
require_once __DIR__ . "../header.php";
?>

<body class="mainBody">

    <div class="info">
        <h1> In this page you can see the difference between a certain dog breed of your own choice with the mean of the
            rest of breeds. Choose your favourite and check the results! </h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 25px;">
                <select id="dogBreed1" class="form-select">
                    <option value="" selected>Choose a breed</option>
                </select>
            </div>
        </div>
    </div>

    <div class="container favouriteContainer">
        <div class="div1" id="chart1"></div>
        <div class="div2" id="chart2"></div>
        <div class="div3" id="chart3"></div>
        <div class="div4" id="chart4"></div>
        <div class="img2" id="img2"></div>
        <div class="div6" id="chart6"></div>
    </div>

</body>

<script>
    $(document).ready(function() {
        var data;
        getAllDogsData(function(response) {
            data = response;
        });

        for (let i = 0; i < data.length; i++) {
            dog = data[i];
            $("#dogBreed1").append("<option value='" + dog.Breed + "'>" + dog.Breed + "</option>")
        }

        $('#headerTitle').text("Check your favourite dog data");
        $('#headerImg').attr("src", "./../imgs/favouriteDog.png");
        var select1 = document.querySelector('#dogBreed1');
        dselect(select1, {
            search: true
        });

        $('#dogBreed1').change(function() {
            getFavouriteDogsData($('#dogBreed1').val());
        });

        var dogs = data;

        var myDogsWeight = new Array();
        var myDogsHeight = new Array();
        var myDogsExpectancy = new Array();
        var myDogsEnergy = new Array();
        var myDogsDemeanor = new Array();

        var meanWeight = 0;
        var meanHeight = 0;
        var meanExpectancy = 0;
        var meanEnergy = 0;
        var meanDemeanor = 0;

        for (i = 0; i < dogs.length; i++) {
            meanWeight += (parseFloat(dogs[i].max_weight) + parseFloat(dogs[i].min_weight)) / 2;
            meanHeight += (parseFloat(dogs[i].max_height) + parseFloat(dogs[i].min_height)) / 2;
            meanExpectancy += (parseFloat(dogs[i].max_expectancy) + parseFloat(dogs[i].min_expectancy)) / 2;
            meanEnergy += parseFloat(dogs[i].energy_level_value);
            meanDemeanor += parseFloat(dogs[i].demeanor_value);
        }

        meanWeight = meanWeight / dogs.length;
        meanWeight = Math.round(meanWeight);
        meanHeight = meanHeight / dogs.length;
        meanHeight = Math.round(meanHeight);
        meanExpectancy = meanExpectancy / dogs.length;
        meanExpectancy = Math.round(meanExpectancy);
        meanEnergy = Math.round((meanEnergy / dogs.length) * 100) / 100;
        meanDemeanor = Math.round((meanDemeanor / dogs.length) * 100) / 100;

        myDogsWeight.push(meanWeight);
        myDogsHeight.push(meanHeight);
        myDogsExpectancy.push(meanExpectancy);
        myDogsEnergy.push(meanEnergy);
        myDogsDemeanor.push(meanDemeanor);

        $('#chart1').highcharts({ //Mean Weight chart
            chart: {
                backgroundColor: '#FFF5EB',
                type: "bar",
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
                }
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
            series: [{}, {
                data: myDogsWeight,
                name: 'Mean'
            }],
            credits: false
        });

        $('#chart2').highcharts({ //Mean Expectancy chart
            chart: {
                backgroundColor: '#FFF5EB',
                type: "column",
                borderColor: "#f1d4b2",
                borderRadius: 5,
                borderWidth: 5,

            },
            title: {
                text: "Mean Expectancy Comparison"
            },
            xAxis: {
                allowDecimals: false,
                title: {
                    text: "Breed"
                }
            },
            yAxis: {
                title: {
                    text: "Years"
                }

            },
            colors: [
                '#82A8D2', '#6AF9C4', '#058DC7', '#50B432', '#ED561B',
                '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263'
            ],
            series: [{}, {
                data: myDogsExpectancy,
                name: 'Mean'
            }],
            credits: false
        });

        $('#chart3').highcharts({ //Mean Height chart
            chart: {
                backgroundColor: '#FFF5EB',
                type: "column",
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
                }
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
            series: [{}, {
                data: myDogsHeight,
                name: 'Mean'
            }],
            credits: false
        });


        $('#chart4').highcharts({ //Energy Level chart
            chart: {
                backgroundColor: '#FFF5EB',
                type: "column",
                borderColor: "#f1d4b2",
                borderRadius: 5,
                borderWidth: 5,
            },
            title: {
                text: "Energy Level Comparison (0 to 1)"
            },
            xAxis: {
                allowDecimals: false,
                title: {
                    text: "Breed"
                }
            },
            yAxis: {
                title: {
                    text: "Energy Level"
                }

            },
            colors: [
                '#82A8D2', '#6AF9C4', '#058DC7', '#50B432', '#ED561B',
                '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263'
            ],
            series: [{}, {
                data: myDogsEnergy,
                name: 'Mean'
            }],
            credits: false
        });

        $('#chart6').highcharts({ // Demeanor Level chart
            chart: {
                backgroundColor: '#FFF5EB',
                type: "bar",
                borderColor: "#f1d4b2",
                borderRadius: 5,
                borderWidth: 5,
            },
            title: {
                text: "Demeanor Level Comparison (0 to 1)"
            },
            xAxis: {
                allowDecimals: false,
                title: {
                    text: "Breed"
                }
            },
            yAxis: {
                title: {
                    text: "Demeanor Level"
                }

            },
            colors: [
                '#82A8D2', '#6AF9C4', '#058DC7', '#50B432', '#ED561B',
                '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263'
            ],
            series: [{}, {
                data: myDogsDemeanor,
                name: 'Mean'
            }],
            credits: false
        });
    });
</script>