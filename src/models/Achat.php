<?php

class Achat extends Db
{


    public static function create(array $data)
    {
        $pdo=self::getDb();

        $request="INSERT INTO achat (id_produit, id_commande) VALUES (:id_produit, :id_commande)";
        $response= $pdo->prepare($request);
        $response->execute(self::htmlspecialchars($data));
        return $pdo->lastInsertId();



    }







}