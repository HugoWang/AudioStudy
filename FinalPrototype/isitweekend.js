$(document).ready(function () {
    var pathname = window.location.pathname;
    //console.log(pathname);
    setInterval(function() {
        var date = new Date();
        //console.log("date"+date.getDay());
       if((date.getDay() == 6 || date.getDay() == 0) && pathname == "/Final%20Prototype%20old/Final%20Prototype/index.html") {
            //its saturday or sunday and you are on wrong page
            window.location.href = 'weekend.html';
            console.log(pathname);
      }
        else if((date.getDay() !== 6 && date.getDay() !== 0) && pathname =="/Final%20Prototype%20old/Final%20Prototype/weekend.html") {
            //its weekday and you are on wrong page
            window.location.href = 'index.html';
        }
               
    }, 2000);
});