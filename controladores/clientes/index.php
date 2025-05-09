<?php

require '../../model/Cliente.php';
header('Content-Type: application/json; charset=UTF-8');

// echo json_encode($_POST);
// exit;

$metodo = $_SERVER['REQUEST_METHOD'];
$codigo = $_REQUEST['codigo'];

if ($metodo == 'GET') {

    try {

        $datos = new Cliente();
        $data = $datos->buscar();



        http_response_code(200);
        echo json_encode([
            'codigo' => 1,
            'mensaje' => 'Se encontraron los datos correctamente',
            'data' => $data
        ]);
        return;
    } catch (Exception $e) {

        http_response_code('400');
        echo json_encode([
            'codigo' => 0,
            'mensaje' => "Error al buscar",
        ]);
    }
} else {

    if ($codigo == 1) {

        try {


            $nuevo_cliente = new Cliente($_POST);
            $crear = $nuevo_cliente->guardar();

            http_response_code(200);
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Se guardo correctamente la informacion'
            ]);
            return;
        } catch (Exception $e) {

            http_response_code('400');
            echo json_encode([
                'codigo' => 0,
                'mensaje' => "Error al guardar",
            ]);
        }
    } elseif ($codigo == 2){
        
    }
}
