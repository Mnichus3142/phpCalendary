function today()
{
    var today = new Date();
    today = today.getDate();

    console.log(today);

    document.getElementById(today).style.backgroundColor = '#119822';
    document.getElementById(today).style.color = '#152614';
}

setInterval(today(), 10);