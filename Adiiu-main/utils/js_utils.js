function get10PopularDogs(data) {
    popularDogs = data.sort(function(a, b){
        return b.popularity - a.popularity;
    });

    return data.slice(0,10);
}

function redirect(url) {
    window.location.replace(url);
}

function getComparisonDogsData(Breed1, Breed2) {
    $.ajax({
        type: "GET",
        url: "/Adiiu/utils/getDogs.php",
        async: true,
        success: function(data) {
            jsonData = JSON.parse(data);
            dogs = jsonData.filter(function(dog) {
                return dog.Breed == Breed1 || dog.Breed == Breed2;
            });
            if(dogs[0]){
                $('#chart1').highcharts().series[0].setName(dogs[0].Breed);
                $('#chart1').highcharts().series[0].setData([[dogs[0].Breed, parseInt(dogs[0].popularity)]]);
                $('#chart2').highcharts().series[0].setName(dogs[0].Breed);
                $('#chart2').highcharts().series[0].setData([[dogs[0].Breed, (parseInt(dogs[0].min_weight) + parseInt(dogs[0].max_weight))/2]]);
                $('#chart3').highcharts().series[0].setName(dogs[0].Breed);
                $('#chart3').highcharts().series[0].setData([[dogs[0].Breed, (parseInt(dogs[0].min_height) + parseInt(dogs[0].max_height))/2]]);
                $('#chart4').highcharts().series[0].setName(dogs[0].Breed);
                $('#chart4').highcharts().series[0].setData([[dogs[0].Breed, (parseInt(dogs[0].min_expectancy) + parseInt(dogs[0].max_expectancy))/2]]);
                $('#chart5').highcharts().series[0].setName(dogs[0].Breed);
                $('#chart5').highcharts().series[0].setData([[dogs[0].Breed, parseFloat(dogs[0].trainability_value)]]);
                $('#chart6').highcharts().series[0].setName(dogs[0].Breed);
                $('#chart6').highcharts().series[0].setData([[dogs[0].Breed, parseFloat(dogs[0].energy_level_value)]]);
            }
            
            if(dogs[1]) {
                $('#chart1').highcharts().series[1].setName(dogs[1].Breed);
                $('#chart1').highcharts().series[1].setData([[dogs[1].Breed, parseInt(dogs[1].popularity)]]);
                $('#chart2').highcharts().series[1].setName(dogs[1].Breed);
                $('#chart2').highcharts().series[1].setData([[dogs[1].Breed, (parseInt(dogs[1].min_weight) + parseInt(dogs[1].max_weight))/2]]);
                $('#chart3').highcharts().series[1].setName(dogs[1].Breed);
                $('#chart3').highcharts().series[1].setData([[dogs[1].Breed, (parseInt(dogs[1].min_height) + parseInt(dogs[1].max_height))/2]]);
                $('#chart4').highcharts().series[1].setName(dogs[1].Breed);
                $('#chart4').highcharts().series[1].setData([[dogs[1].Breed, (parseInt(dogs[1].min_expectancy) + parseInt(dogs[1].max_expectancy))/2]]);
                $('#chart5').highcharts().series[1].setName(dogs[1].Breed);
                $('#chart5').highcharts().series[1].setData([[dogs[1].Breed, parseFloat(dogs[1].trainability_value)]]);
                $('#chart6').highcharts().series[1].setName(dogs[1].Breed);
                $('#chart6').highcharts().series[1].setData([[dogs[1].Breed, parseFloat(dogs[1].energy_level_value)]]);
            }
        }
    });
}

function getFavouriteDogsData(Breed1) {
    $.ajax({
        type: "GET",
        url: "/Adiiu/utils/getDogs.php",
        async: true,
        success: function(data) {
            jsonData = JSON.parse(data);
            dogs = jsonData.filter(function(dog) {
                return dog.Breed == Breed1;
            });
            if(dogs[0]){
                $('#chart1').highcharts().series[0].setName(dogs[0].Breed);
                $('#chart1').highcharts().series[0].setData([[dogs[0].Breed, (parseInt(dogs[0].min_weight) + parseInt(dogs[0].max_weight))/2]]);
                $('#chart2').highcharts().series[0].setName(dogs[0].Breed);
                $('#chart2').highcharts().series[0].setData([[dogs[0].Breed, (parseInt(dogs[0].min_expectancy) + parseInt(dogs[0].max_expectancy))/2]]);
                $('#chart3').highcharts().series[0].setName(dogs[0].Breed);
                $('#chart3').highcharts().series[0].setData([[dogs[0].Breed, (parseInt(dogs[0].min_height) + parseInt(dogs[0].max_height))/2]]);
                $('#chart4').highcharts().series[0].setName(dogs[0].Breed);
                $('#chart4').highcharts().series[0].setData([[dogs[0].Breed, parseFloat(dogs[0].energy_level_value)]]);
                $('#chart6').highcharts().series[0].setName(dogs[0].Breed);
                $('#chart6').highcharts().series[0].setData([[dogs[0].Breed, parseFloat(dogs[0].demeanor_value)]]);
            }
        }
    });
}

function getAllDogsData(callback) {
    $.ajax({
        type: "GET",
        url: "/Adiiu/utils/getDogs.php",
        async: false,
        success: function(data) {
            callback(JSON.parse(data));
        }
    });
}