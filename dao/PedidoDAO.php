<?php 

class PedidoDAO {

    /**
     * Guarda un pedido en base de datos
     * sobre la tabla Pedidos.
     * @param $pedido es un modelo de tipo Pedido.php
     */
    public function crearPedido($pedido) {
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB("localhost","root","","cacproyecto");
        $conexionDB->conectar();
    
        $sql = "INSERT INTO pedidos 
        (`nombre`, `apellido`, `usuario`, `mail`, `lugarentrega`, `localidad`, `provincia`, `codpostal`, `formadepago`, `tarjtitular`, `tarjnumero`, `tarjvto`, `tarjclave`) 
        VALUES (
        '{$pedido->getNombre()}', 
        '{$pedido->getApellido()}', 
        '{$pedido->getUsuario()}', 
        '{$pedido->getMail()}', 
        '{$pedido->getLugarentrega()}', 
         {$pedido->getLocalidad()},
         {$pedido->getProvincia()}, 
         '{$pedido->getCodpostal()}', 
         '{$pedido->getFormadepago()}', 
         '{$pedido->getTarjtitular()}', 
         {$pedido->getTarjnumero()}, 
         '{$pedido->getTarjvto()}', 
         {$pedido->getTarjclave()})";
        
        $conexionDB->ejecutar($sql);
    
        return $conexionDB->cantFilas() > 0;
    }

    public function listarPedidos() {
        require_once("../dataBase/ConexionDB.php");
        $conexionDB = new ConexionDB("localhost","root","","cacproyecto");
        $conexionDB->conectar();

        $sql = "SELECT * FROM pedidos";
        $result = $conexionDB->ejecutar($sql);
        var_dump($result);

        while ($pedido = $result->fetch_assoc()) {
            $listaPedidos[] = $pedido;
        }

        return $listaPedidos;
    }
}
?>
