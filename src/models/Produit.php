<?php

class Produit extends Db
{




    public static function create(array $data)
    {
        // $data recoit un tableau avec les marqueurs associés à leur valeur

        $request="INSERT INTO produit (titre, photo, description, prix, etat, type, id_utilisateur, id_categorie) VALUES (:titre, :photo,:description, :prix,:etat,:type, :id_utilisateur, :id_categorie )";
        $response=self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($data));
        return self::getDb()->lastInsertId();
        
    }

    public static function readNoVrac()
    {
        $request="SELECT * FROM produit WHERE etat !=4 AND statut=0";
        $response=self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function readVrac()
    {
        $request="SELECT * FROM produit WHERE etat =4 AND statut=0";
        $response=self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function readAll(array $id)
    {
        $request="SELECT * FROM produit WHERE statut=0 AND id_utilisateur=:id_utilisateur";
        $response=self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function updateStatut(array $id)
    {
        $request="UPDATE produit SET statut=1 WHERE id=:id";
        $response=self::getDb()->prepare($request);
        return $response->execute($id);


    }

    public static function readOne($id)
    {
        $request="SELECT * FROM produit WHERE id=:id";
        $response=self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetch(PDO::FETCH_ASSOC);

    }


    public static function update(array $data)
    {

        //$data reçoit un tableau avec les marqueurs associé a leur valeur
        //échappement des données avec htmlspecialchars()



        $request= "UPDATE produit SET titre=:titre, photo=:photo, description=:description, prix=:prix, etat=:etat, type=:type  WHERE id=:id, id_categorie=:id_categorie";

        $response=self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($data));
        return self::getDb()->lastInsertId();


    }

    public static function delete(array $data)
    {

        $request= "DELETE FROM produit  WHERE id=:id";

        $response=self::getDb()->prepare($request);
        return $response->execute(self::htmlspecialchars($data));

    }



}