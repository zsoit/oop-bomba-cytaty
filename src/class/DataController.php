<?php
class DataController
{
    public static function fetchGET($GET)
    {
        return isset($_GET[$GET]) ? $_GET[$GET] : null;
    }

    public static function fetchPOST($POST)
    {
        return isset($_POST[$POST]) ? $_POST[$POST] : null;
    }

    public static function randomNumerFromArray($array)
    {
            $liczba_losowa = null;
            if (!empty($array)) {
                $losowy_indeks = array_rand($array);
                $liczba_losowa = $array[$losowy_indeks];
            }
            return $liczba_losowa;
    }
}