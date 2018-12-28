    window.onload = setInterval(clock,1000);

    function clock()
    {
    var d = new Date();

    var date = d.getDate();

    var month = d.getMonth();
    var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
    month=montharr[month];

    var year = d.getFullYear();

    var day = d.getDay();
    var dayarr =["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];
    day=dayarr[day];

    var hour =d.getHours();
    var min = d.getMinutes();
    var sec = d.getSeconds();

    if (hour < 10) {
    hour = '0'+hour;
    }

    if (sec < 10) {
    sec = '0'+sec;
    }

    if (min < 10) {
    min = '0'+min;
    }
    document.getElementById("date").innerHTML=day+" "+month+" "+date+", "+year;
    document.getElementById("time").innerHTML=hour+":"+min+":"+sec;
    }