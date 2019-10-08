
$(".search").click( function(e){
        var submitButton = $("#actividadeconomica").attr("required", true);
        var submitButton = $("#actividadeconomica").attr("pattern", '[0-9]{4}');
        var v = grecaptcha.getResponse();
        if(v.length == 0)
        {
            alert("No completaste el captcha")
            return false;
            e.preventDefault();
        }
        else
        {
            document.getElementById('captcha').innerHTML="Captcha completado";
            return true; 
        }
        
});
