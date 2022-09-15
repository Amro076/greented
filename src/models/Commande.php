<?php

class Commande extends Db
{

    public static function create(array $data)
    {
        $pdo=self::getDb();

        $request="INSERT INTO commande (id_utilisateur, date, statut) VALUES (:id_utilisateur, :date, :statut)";
       $response= $pdo->prepare($request);
       $response->execute(self::htmlspecialchars($data));
       return $pdo->lastInsertId();



    }






}