
    function escrever(){
        var $dados= $('#dados');
        $.ajax({
            url: "https://api.open-meteo.com/v1/forecast?latitude=52.52&longitude=13.41&current_weather=true&hourly=temperature_2m,relativehumidity_2m,windspeed_10m",
            type:"GET",
            success: function (data) {
                $dados.append("<li>"+ JSON.stringify(data)+"<li>")
            }
        });
    }