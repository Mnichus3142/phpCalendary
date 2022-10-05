<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalendarz</title>
    <link rel="stylesheet" type="text/css" href="style/root.css">
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <div class="change">
        <form action="index.php" method="POST">
            <label for="month">Wybierz miesiąc</label>
            <input type="month" id="month" name="month">
            <input type="submit" value="Przejdź" name="submit">
        </form>
    </div>
    <div class="container">
        <?php
            require './php/calendary.php';

            if (isset($_GET['error']))
            {
                $error = $_GET['error'];
                echo "<script>alert('$error')</script>";
            }

            if(isset($_POST['submit']))
            {
                if(isset($_POST['month']) && !empty($_POST['month'])) 
                {
                    $month = $_POST['month'];
                    $month = explode("-", $month);                    

                    $test = new calendary();

                    $test->setMonth($month[1]);
                    $test->setYear($month[0]);
        
                    echo $test->printTable();
                }

                else {
                    header("Location: index.php?error=Wprowadź datę");
                }
            }

            else 
            {
                $test = new calendary();

                $test->setMonth(date('m'));
                $test->setYear(date('Y'));

                echo $test->printTable();
            }
        ?>
    </div>
    
</body>
<script src="js/today_is.js"></script>
</html>