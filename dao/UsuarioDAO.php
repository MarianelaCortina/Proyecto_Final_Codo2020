<?php 
class UsuarioDAO {

    public function validarUsuario($usuario, $password) {
        require_once("../dataBase/ConexionDB.php");

        $conexionDB = new ConexionDB("localhost","root","","cacproyecto");
        $conexionDB->conectar();
    
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$password'";
        $conexionDB->ejecutar($sql);
    
        return $conexionDB->cantFilas() > 0;
    }
}

?>