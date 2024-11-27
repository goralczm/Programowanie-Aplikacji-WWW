function getDate()
{
    date = new Date();
    formattedDate = "" + date.getDate() + "." + (date.getMonth() + 1) + "." + (date.getYear() - 100);
    var dataObj = document.getElementById("data");
    if (dataObj != null)
        dataObj.innerHTML = formattedDate;
}

var timerID = null;
var timerRunning = false;

function stopClock()
{
    if (timerRunning)
        clearTimeout(timerID);
    timerRunning = false;
}

function startClock()
{
    stopClock();
    getDate();
    showTime();
}

function showTime()
{
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var formattedTime = "" + ((hours > 12) ? hours - 12 : hours);
    formattedTime += ((minutes < 10) ? ":0" : ":") + minutes;
    formattedTime += ((seconds < 10) ? ":0" : ":") + seconds;
    formattedTime += (hours >= 12) ? " P.M." : " A.M";
    var zegarek = document.getElementById("zegarek");
    if (zegarek != null)
        zegarek.innerHTML = formattedTime;
    timerID = setTimeout("showTime()", 1000);
    timerRunning = true;
}