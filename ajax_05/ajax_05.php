<?php
	$servername = "localhost";
	$dbName = "dwec_biblioteca";
	$username = "jymi";
	$password = "jymi";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbName;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		/**CONTROLO QUE LE PASO ESE CONTROLADOR */
		if(isset($_GET["editorial"])) {
			$editorial = $_GET["editorial"];
			foreach($conn->query("SELECT * FROM libros where editorial ='" . $editorial . "'") as $fila) {
				/**AQUI ME DEVUELVE LAS OPTION, QUE LUEGO LE VOY A PEDIR DESDE EL ID DE SELECT
				 * DONDE LAS IRE COLOCANDO */
				echo "<option value='".$fila["Id"]."'>".$fila["titulo"]."</option>";
			}
		} else {
			foreach($conn->query("SELECT distinct editorial FROM libros order by editorial") as $fila) {
				echo "<option>".$fila["editorial"]."</option>";
			}
		}

	} catch(PDOException $e) {
		echo "Fallo la conexión: " . $e->getMessage();
	}
?>