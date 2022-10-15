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

    public static function commandeVendeur(array $id)
    {


    }
    public static function commandeAcheteur(array $id)
    {
        $request="SELECT * FROM commande WHERE id_utilisateur=:id_utilisateur";
        $response=self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function detailCommandeVendeur (array $id)
    {
        $pdo=self::getDb();

        $request="SELECT p.titre, p.prix, p.photo, u.*, c.date , c.statut, l.*
         FROM produit p 
         INNER JOIN achat a
         ON a.id_produit=p.id
         INNER JOIN commande c
         ON a.id_commande=c.id
         INNER JOIN livraison l
         ON l.id_commande=c.id    
         INNER JOIN utilisateur u 
         ON u.id=c.id_utilisateur
         WHERE  p.id_utilisateur=:id";

        $response=self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetchAll(PDO::FETCH_ASSOC);

    }


    public static function updateStatut($data)
    {
        $request="UPDATE commande SET statut=:statut WHERE id=:id";
        $response=self::getDb()->prepare($request);
        $response->execute($data);
    }








}