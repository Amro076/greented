<?php

class Utilisateur extends Db
{

    public static function create(array $data)
    {
        // $data recoit un tableau avec les marqueurs associés à leur valeur

        $request="INSERT INTO utilisateur (email,pseudo, nom, prenom, mdp, tirelire, numero_voie, voie, cp, ville, point_relais, role) VALUES (:email,:pseudo, :nom, :prenom, :mdp, :tirelire, :numero_voie, :voie, :cp, :ville, :point_relais, :role )";
        $response=self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($data));
        return self::getDb()->lastInsertId();

    }

    public static function update(array $data)
    {
        // $data recoit un tableau avec les marqueurs associés à leur valeur

        $request = "UPDATE utilisateur SET email=:email, pseudo=:pseudo, nom=:nom, prenom=:prenom, numero_voie=:numero_voie, voie=:voie, cp=:cp, ville=:ville WHERE id=:id";
        $response = self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($data));
        return self::getDb()->lastInsertId();
    }

        public static function findByEmail($email)
    {
        $request="SELECT * FROM utilisateur WHERE email=:email";
        $response=self::getDb()->prepare($request);
        $response->execute($email);

        return $response->fetch(PDO::FETCH_ASSOC);

    }

    public static function findById($id)
    {
        $request="SELECT * FROM utilisateur WHERE id=:id";
        $response=self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetch(PDO::FETCH_ASSOC);

    }


    public static function updateTirelire(array $data)
    {
        $request="UPDATE utilisateur SET tirelire=:tirelire WHERE id=:id";
        $response=self::getDb()->prepare($request);
        return $response->execute($data);

    }
    public static function updateRelais(array $data)
    {
        $request="UPDATE utilisateur SET point_relais=:point_relais WHERE id=:id";
        $response=self::getDb()->prepare($request);
        return $response->execute($data);

    }

    public static function updateMdp(array $data)
    {
        $request="UPDATE utilisateur SET mdp=:mdp WHERE id=:id";
        $response=self::getDb()->prepare($request);
        return $response->execute($data);

    }

    public static function findAdresse ($id)
    {
        $request="SELECT numero_voie, voie, cp, ville, point_relais FROM utilisateur WHERE id=:id";
        $response=self::getDb()->prepare($request);
        return $response->execute($id);



    }









}