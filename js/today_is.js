function today()
{
    var today = new Date();
    today = today.getDate();

    console.log(today);

    document.getElementById(today).style.backgroundColor = '#F9DBBB';
    document.getElementById(today).style.color = '#4E6E81';
}

setInterval(today(), 10);