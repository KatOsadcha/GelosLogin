<?php

    session_start();
    if ($_POST) {

        if (isset($_POST['register'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confpass = $_POST['confpass'];

            // CHECK IF USER ALREADY EXIST
            $accounts = file('accounts.txt') or die("Unable to open file...");
            foreach ($accounts as $account) {
                list($exist_username, $exist_password) = explode(' ', trim($account));
                if ($username == $exist_username) {
                    header("Location:register.php?errorusername=1");
                    exit;
                }
            }

            // CHECK IF PASSWORD IS STRONG
            $char_list = ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '=', '+', '[', '{', ']', '}', '|', ';', ':', '"', ',', '<', '.', '>', '/', '?'];
            $num_list = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
            $low_list = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'v', 'x', 'y', 'z'];
            $up_list = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'V', 'X', 'Y', 'Z'];

            foreach($password as $test_each) {
                if(!in_array($test_each, $char_list) || !in_array($test_each, $num_list) || !in_array($test_each, $low_list) || !in_array($test_each, $up_list)) {
                    header("Location:register.php?errorstrongpassword=1");
                    exit;
                }
            }

            if ($password === $confpass) {
                $accounts = fopen("accounts.txt", "a") or die("Unable to open file");
                $txt = "$username $password\n";
                fwrite($accounts, $txt);
                $_SESSION['session_username'] = $username;
                fclose($accounts);
                header("Location:register.php?success=1");
                exit;
            } else {
                header("Location:register.php?error=1");
                exit;
            }
            
        
            
        } 
     
    }  
    exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gelos Enterprises</title>
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
        <h1>Create account</h1>
        <?php
        //place code here to create account
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