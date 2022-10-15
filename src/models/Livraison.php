<?php

class Livraison extends Db{

    public static function create($data){


        $pdo=self::getDb();

        $request="INSERT INTO livraison (date_reception, id_relais, id_commande, statut) VALUES (:date_reception, :id_relais, :id_commande, :statut)";
        $response = $pdo->prepare($request);
        $response->execute(self::htmlspecialchars($data));
        return self::getDb()->lastInsertId();

    }
    public static function getPointRelais(){

        $request = "SELECT * FROM utilisateur WHERE point_relais = 1";
        $response=self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function detailLivraison($id)
    {
        $request="SELECT * FROM livraison WHERE id_commande=:id_commande";
        $response=self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetch(PDO::FETCH_ASSOC);

    }

    public static function updateStatut($data)
    {
        $request="UPDATE livraison SET statut=:statut WHERE id=:id";
        $response=self::getDb()->prepare($request);
        $response->execute($data);
    }


}
?>
