<?php 

namespace Dao\Productos;

use Dao\Table;

class Categoria extends Table {
    public static function obtenerCategorias() {
        $sqlstr = "SELECT * from categorias";
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function obtenerCategoriaPorId ($id) {
        $sqlstr = "SELECT * from categorias where id=:id;";
        $params = ["id"=>$id];
        return self::obtenerUnRegistro($sqlstr, $params);
    }

    public static function crearCategoria(
        $name,
        $status
    ) {
        $params = [
            "name" => $name,
            "status" => $status
        ];
        $sqlstr = "INSERT INTO categorias (name, status, create_time) values(:name, :status, NOW());";
        return self::executeNonQuery($sqlstr, $params);

    }

    public static function actualizarCategoria($id, $name, $status) {
        $sqlstr = "UPDATE categorias set name=:name, status=:status where id=:id;";
        $params = [
            "name" => $name,
            "status" => $status,
            "id" => $id
        ];
        return self::executeNonQuery($sqlstr, $params);
    }

    public static function deleteCategoria($id) {
        $sqlstr = "DELETE from categorias where id=:id;";
        $params = [
            "id" => $id
        ];
        return self::executeNonQuery($sqlstr, $params);
    }

}