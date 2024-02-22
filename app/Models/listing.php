<?php 
    namespace App\Models;

    class Listing {

        public static function getAll() {
            return [
                [
                    "id" => 1,
                    "nome" => "Davi",
                    "idade" => 20
                ],
                [
                    "id" => 2,
                    "nome" => "Davi 2",
                    "idade" => 20
                ]
            ];
        }

        public static function find($id) {
            $listings = self::getAll();
            foreach($listings as $listing) {
                if($listing["id"] == $id) {
                    return $listing;
                }
            }
        }
    }
?>