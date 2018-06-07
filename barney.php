<!DOCTYPE html>
<html>
<body bgcolor="#848484" link="red" alink="red" vlink="red">

<center><b>Escanear el host de Barney</b><br>
<b>=====================</b>
</center>
<br><br><br>

<form action="#" method="POST">
 <fieldset>
  <legend><b>Elija el host de la victima:</b></legend>
         <select name="host">
 		<option value="ninguno">Ninguno</option>
 		<option value="192.241.163.11">192.241.163.11 [Barney]</option>
  		<option value="138.68.40.240">138.68.40.240 [Empresa X]</option>
                </select>
        <input type="submit" value="Scan Port!">
 </fieldset>
</form>
<br>

	<?php
		function scan_nmap(){
			# ejecutar nmap y guardarlo en una variable
			$scan1 = shell_exec('nmap ' . $_POST['host'] . ' -p 21,20 | grep open');
			$scan2 = shell_exec('nmap ' . $_POST['host'] . ' -p 110 | grep open');
			$scan3 = shell_exec('nmap ' . $_POST['host'] . ' -p 80 | grep open');

			# Si la variable esta vacia el puerto esta cerrado, caso contrario esta abierto
			if (empty($scan1 or $scan2 or $scan3)){
				echo "<font color='red'> >>El puerto 21, 110 u 80 no se encuentran abiertos...</font>";
			} elseif ($_POST['host'] == "ninguno"){
				echo "No ha seleccionado ningún host...";
			} else {
				echo "<font color='lime'>";
				echo "PORT   STATE  SERVICE<br>";
				echo $scan1 . "<br>";
				echo $scan2 . "<br>";
				echo $scan3 . "<br>";
				echo "</font>";
			}
		}

	scan_nmap();
	?>
<p><b>Nota:</b> Esto es una prueba educativa con servidores propios del profesor - Ernesto Sequeira</p>

<div align="center"><a href="https://github.com/ernestosequeira/barney/">Github</a></div>

</body>
</html>
