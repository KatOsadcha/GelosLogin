<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <header>
        <div id="headerContent">
            
            <nav>
                <ul>
                    <li class="menu">
                        <a href="index.php">
                            <img src="images/GE-icon.png" alt="Gelos Enterprises" width="47" height="55">
                        </a>
                    </li>
                    <li class="menu"><a href="login.php">LOGIN</a></li>
                    <li class="menu"><a href="admin_login.php">ADMIN LOGIN</a></li>
                    <li class="menu"><a href="register.php">REGISTER</a></li>
                    <li class="menu"><a href="marks.php">MARKS</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="banner">
        <img src="images/GE-stacked-logo-reverse.png" alt="" width="200" height="106">
    </section>
    <main>
        <h1>Calculation of your marks</h1>
        <?php
            if (isset($_POST['calculate'])) {
                //read the 5 marks
                $mark1 = $_POST["mark1"];
                $mark2 = $_POST["mark2"];
                $mark3 = $_POST["mark3"];
                $mark4 = $_POST["mark4"];
                $mark5 = $_POST["mark5"];

                //create array with marks
                $marks = [$mark1, $mark2, $mark3, $mark4, $mark5];

                $total = 0;
                //display the array and calculate sum
                foreach($marks as $mark)
                {
                    if ($mark < 0 || $mark > 100) {
                        header("Location:marks.php?error=1");
                        exit;
                    }
                    $total = $total + $mark;
                }
                
                //calculate the average
                $average = $total / 5;

                //display sum and average
                echo "<p>Your marks are: ".implode(", ", $marks)."</p>";
                echo "<p>The sum of your marks is: $total</p>";
                echo "<p>The average of your marks is: $average</p>";
            }
        ?>
        
    </main>
    <footer>
        <p>Contact us</p>
        <p>A: 111 Business Avenue, TULITZA NSW 9460<br>
        P: 02 0000 0000<br>
        E: contactus@gelosmail.com.au</p>
    
        <p>Gelos Enterprises would like to pay our respect and acknowledge Aboriginal and Torres Strait Islander Peoples as the Traditional Custodians of the land, rivers and sea. We acknowledge and pay our respect to the Elders, both past and present of all Nations.</p>				
        <p>This site has been developed by TAFE NSW &copy TAFE NSW <?php echo date("Y") ?></p>
        <p >Please note this is a fictitious organisation and has been created purely for educational purposes only.</p>
    </footer>
</body>
</html>