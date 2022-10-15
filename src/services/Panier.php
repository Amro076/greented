<?php

class Panier
{


    public static function add($id)
    {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
        $panier = $_SESSION['panier'];

        $panier[] = $id;

        $_SESSION['panier'] = $panier;

    }

    public static function remove($id)
    {
        $panier = $_SESSION['panier'];

        if (count($panier) > 1):

            foreach ($panier as $index => $value) {
                if ($value == $id) {
                    array_splice($panier, $index, 1);
                }

            }
            $_SESSION['panier'] = $panier;
        else:
            self::delete();
        return 1;
        endif;



    }

    public static function delete()
    {
        unset($_SESSION['panier']);

    }

    public static function getPanier()
    {

        $panier = $_SESSION['panier'];
        $panierDetail = [];
        foreach ($panier as $index => $id) {
            $panierDetail[] = Produit::readOne(['id' => $id]);

        }

        return $panierDetail;


    }

    public static function getTotal()
    {
        $total = 0;

        foreach (self::getPanier() as $index => $annonce) {

            $total += $annonce['prix'];

        }

        return $total;


    }


}