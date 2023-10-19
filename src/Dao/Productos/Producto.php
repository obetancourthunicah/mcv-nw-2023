<?php 
namespace Dao\Productos;

class Producto {

    public static function getAllProducts(){
        return array(
            array(
                "id" => 1,
                "name" => "Panadol",
                "img_url" => "https://placehold.co/300x220?text=Panadol",
                "price" => 100,
                "bar_code" => "00001"
            ),
            array(
                "id" => 2,
                "name" => "Panadol Ultra",
                "img_url" => "https://placehold.co/300x220?text=PanadolUltra",
                "price" => 200,
                "bar_code" => "00002"
            ),
            array(
                "id" => 3,
                "name" => "Panadol Gripe y Tos",
                "img_url" => "https://placehold.co/300x220?text=PanadolGripe",
                "price" => 300,
                "bar_code" => "00003"
            )
        );
    }

    public static function getProductById($id){
        $product = array();
        $productos = self::getAllProducts();
        foreach ($productos as $prodi) {
            if ($prodi["id"] === $id) {
                $product = $prodi;
                break;
            }
        }
        return $product;
    }
}