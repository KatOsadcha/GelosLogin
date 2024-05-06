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
        <h1>Register</h1>
        <form action="register_process.php" method="post">
            <?php 
                if(isset($_GET['success'])) { echo "<p style='color: green; font-size: 14px;'>You are successfully registered!</p>"; }
                if(isset($_GET['errorusername'])) { echo "<p style='color: red; font-size: 14px;'>The user already exist. Try again</p>"; }
            ?>
        <p>You can create your own password or generate a password, leave the password box empty to generate a password.</p>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" require>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" minlength="8" require> 
            </div>
            <div>
                <label for="confpass">Confirm password:</label>
                <input type="password" id="confpass" name="confpass"> 
                <?php if(isset($_GET['error'])) { echo "<p style='color: red; font-size: 14px;'>Your passwords do not match. Try again</p>"; }
                        if(isset($_GET['errorstrongpassword'])) { echo "<p style='color: red; font-size: 14px;'>Your password must contains lower case, upper case, numbers and spetial characters. Try again</p>"; }?>
            </div>
            <div>
                <button type="submit" name="register">REGISTER</button>
            </div>
        </form>
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