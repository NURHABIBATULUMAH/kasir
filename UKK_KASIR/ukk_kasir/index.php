<html>
<head>
	<title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login">
        <h4 class="login-header">Masukkan Username dan Password</h2>
        <form method="post" action="cek_login.php" class="login-container">
            <p>
                <input type="username" name="username" placeholder="Username">
            </p>
            <p>
                <input type="password" name="password" placeholder="Password">
            </p>
            <p>
                <input type="submit" value="Log in">
            </p>
        </form>
                        <?php 
							if(isset($_GET['pesan'])){
								if($_GET['pesan']=="gagal"){
									echo "<div class='alert'><b>Username dan Password tidak sesuai !</div>";
								}
							}
						?>
</div>
</body>
</html>