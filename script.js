let weather = {
    "apykey": "41d844d4b65e4eb1b12161201222410",
    fetchWeather:function(){
        fetch("http://api.weatherapi.com/v1/current.xml?key=41d844d4b65e4eb1b12161201222410&q=London&aqi=no"
        ).then((response) => response.json())
        .then((data) => console.log());
    }
}