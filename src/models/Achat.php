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


    public static function detailAchat($id)
    {
        $request="SELECT * FROM achat WHERE id_commande=:id_commande";
        $response=self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetchAll(PDO::FETCH_ASSOC);

    }


    public static function detailCommandeAcheteur($id)
    {
        $request="SELECT p.titre, p.prix, p.photo, u.*, c.date , c.statut
         FROM produit p 
         INNER JOIN achat a
         ON a.id_produit=p.id
         INNER JOIN commande c
         ON a.id_commande=c.id
         INNER JOIN utilisateur u 
         ON u.id=c.id_utilisateur
         WHERE  u.id=:id";

        $response=self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetchAll(PDO::FETCH_ASSOC);

    }






}