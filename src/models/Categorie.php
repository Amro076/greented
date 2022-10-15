<?php

class Categorie extends Db
{

    public static function create(array $data)
    {
        $request="INSERT INTO categorie (titre) VALUES (:titre)";
        $response=self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($data));
    }


    public static function readOne(array $id)
    {
        $request="SELECT * FROM categorie WHERE id=:id";
        $response=self::getDb()->prepare($request);
        $response->execute($id);
        return $response->fetch(PDO::FETCH_ASSOC);


    }

    public static function readAll()
    {
        $request="SELECT * FROM categorie ";
        $response=self::getDb()->prepare($request);
        $response->execute();
        return $response->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function update(array $data)
    {

        $request="UPDATE categorie SET titre=:titre WHERE id=:id";
        $response=self::getDb()->prepare($request);
        $response->execute(self::htmlspecialchars($data));
    }

    public static function delete(array $id)
    {

        $request="DELETE FROM categorie WHERE id=:id";
        $response=self::getDb()->prepare($request);
        $response->execute($id);
    }
















}