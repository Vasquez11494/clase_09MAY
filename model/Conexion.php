<?php

abstract class Conexion
{
    protected static $conexion = null;

    public static function connectar(): PDO
    {
        if (!self::$conexion) {

            try {
                self::$conexion = new PDO("informix:host=192.168.73.71; service=1526;database=mdn; server=MV015_tcp; protocol=onsoctcp;EnableScrollableCursors=1", "656751", "656751");
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "No hay conexion a la BD";
                echo "<br>";
                echo $e->getMessage();
                self::$conexion = null;
                exit;
            }
        }

        return self::$conexion;
    }
    // METODO PARA EJECUTAR SENTENCIAS SQL

    public function ejecutar($sql)
    {
        $conexion = self::connectar();
        $sentencia = $conexion->prepare($sql);
        $resultado = $sentencia->execute();
        $idInsertado = $conexion->lastInsertId();
        return [
            "resultado" => $resultado,
            "id" => $idInsertado
        ];
    }

    // METODO PARA CONSULTAR INFORMACION
    public function servir($sql)
    {
        $conexion = self::connectar();
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute();
        $data = $sentencia->fetchAll(PDO::FETCH_ASSOC);

        $datos = [];
        foreach ($data as $k => $v) {
            $datos[] = array_change_key_case($v, CASE_LOWER);
        }
        return $datos;
    }

    public static function getConexion(): PDO
    {
        self::connectar();
        return self::$conexion;
    }
}
