<?php

//Require repositories to get constants
require 'OdrudaRepository.php';
require 'PouzitiRepository.php';
require 'PrazirnaRepository.php';
require 'RegionRepository.php';
require 'StupenPrazeniRepository.php';
require 'ZemePuvoduRepository.php';
require 'ZpusobZpracovaniRepository.php';

require 'database.class.php';
require 'BaseRepository.php';

//Use Classes to get to constants
use Model\OdrudaRepository;
use Model\PouzitiRepository;
use Model\PrazirnaRepository;
use Model\RegionRepository;
use Model\StupenPrazeniRepository;
use Model\ZemePuvoduRepository;
use Model\ZpusobZpracovaniRepository;


class CoffeeRepository extends BaseRepository{

    const
        TABLE_NAME     = 'kava',
        COL_ID         = 'id',
        COL_NAZEV      = 'nazev',
        COL_CENA       = 'cena',
        COL_SLEVA      = 'sleva',
        COL_CENASLEVA  = 'cena_sleva',
        COL_IMAGE      = 'image',
        COL_POPIS      = 'popis',
        COL_VAHA       = 'vaha',
        COL_ID_PRAZIRNA = 'id_prazirna',
        COL_ID_POUZITI = 'id_pouziti',
        COL_ID_ODRUDA = 'id_odruda',
        COL_ID_REGION = 'id_region',
        COL_ID_STUPEN_PRAZENI = 'id_stupen_prazeni',
        COL_ID_ZPUSOB_ZPRACOVANI = 'id_zpusob_zpracovani',
        COL_ID_ZEME = 'id_zeme',
        COL_RATING     = 'avg_rating';

    protected $db;


    public function getAllCoffee() {
        $query = "SELECT ".self::COL_ID.", ".self::COL_NAZEV.", ".self::COL_CENA.", ".self::COL_SLEVA.", ".self::COL_CENASLEVA.", 
                         ".self::COL_IMAGE.", ".self::COL_RATING."
                 FROM coffee_with_rating";
        
        //Execute DB query
        if($re = $this->db->execute($query)) {
            if($re->num_rows > 0) {
                return $this->turnToJson($re);
            }else {
                //No coffee in db
                return false;
            }
        }
    }

    public function getCoffee($id) {
        $query = "SELECT ".self::TABLE_NAME.".".self::COL_NAZEV.", ".self::TABLE_NAME.".".self::COL_CENA.", ROUND((".self::TABLE_NAME.".".self::COL_CENA.") - (".self::TABLE_NAME.".".self::COL_CENA."/100*".self::TABLE_NAME.".".self::COL_SLEVA.") ,2) AS ".self::COL_CENASLEVA.", ".self::TABLE_NAME.".".self::COL_SLEVA.", ".self::TABLE_NAME.".".self::COL_POPIS.", ".self::TABLE_NAME.".".self::COL_IMAGE.", ".self::TABLE_NAME.".".self::COL_VAHA.",
        ".PrazirnaRepository::TABLE_NAME.".".PrazirnaRepository::COL_NAZEV." AS prazirna_nazev, ".PouzitiRepository::TABLE_NAME.".".PouzitiRepository::COL_NAZEV." AS pouziti_nazev, ".OdrudaRepository::TABLE_NAME.".".OdrudaRepository::COL_NAZEV." AS odruda_nazev, ".RegionRepository::TABLE_NAME.".".RegionRepository::COL_NAZEV." AS region_nazev, ".StupenPrazeniRepository::TABLE_NAME.".".StupenPrazeniRepository::COL_NAZEV." AS stupenPrazeni_nazev, ".ZemePuvoduRepository::TABLE_NAME.".".ZemePuvoduRepository::COL_NAZEV." AS zemePuvodu_nazev, ".ZpusobZpracovaniRepository::TABLE_NAME.".".ZpusobZpracovaniRepository::COL_NAZEV." AS zpusobZpracovani_nazev, co.avg_rating
        FROM ".self::TABLE_NAME."
        LEFT JOIN ".PrazirnaRepository::TABLE_NAME." ON ".PrazirnaRepository::TABLE_NAME.".".PrazirnaRepository::COL_ID." = ".self::TABLE_NAME.".".self::COL_ID_PRAZIRNA."
        LEFT JOIN ".PouzitiRepository::TABLE_NAME." ON ".PouzitiRepository::TABLE_NAME.".".PouzitiRepository::COL_ID." = ".self::TABLE_NAME.".".self::COL_ID_POUZITI."
        LEFT JOIN ".OdrudaRepository::TABLE_NAME." ON ".OdrudaRepository::TABLE_NAME.".".OdrudaRepository::COL_ID." = ".self::TABLE_NAME.".".self::COL_ID_ODRUDA."
        LEFT JOIN ".RegionRepository::TABLE_NAME." ON ".RegionRepository::TABLE_NAME.".".RegionRepository::COL_ID." = ".self::TABLE_NAME.".".self::COL_ID_REGION."
        LEFT JOIN ".StupenPrazeniRepository::TABLE_NAME." ON ".StupenPrazeniRepository::TABLE_NAME.".".StupenPrazeniRepository::COL_ID." = ".self::TABLE_NAME.".".self::COL_ID_STUPEN_PRAZENI."
        LEFT JOIN ".ZpusobZpracovaniRepository::TABLE_NAME." ON ".ZpusobZpracovaniRepository::TABLE_NAME.".".ZpusobZpracovaniRepository::COL_ID." = ".self::TABLE_NAME.".".self::COL_ID_ZPUSOB_ZPRACOVANI."
        LEFT JOIN ".ZemePuvoduRepository::TABLE_NAME." ON ".ZemePuvoduRepository::TABLE_NAME.".".ZemePuvoduRepository::COL_ID." = ".self::TABLE_NAME.".".self::COL_ID_ZEME."
        LEFT JOIN coffee_with_rating AS co ON co.id = ".self::TABLE_NAME.".".self::COL_ID."
        WHERE ".self::TABLE_NAME.".".self::COL_ID." = ".$id."";

        /*
        Popř. ve stringu bez konstant - doplnit aliasy u nazvu jako je to nahoře (odruda_nazev,....):
        SELECT k.nazev, k.cena, ROUND((k.cena) - (k.cena/100*k.sleva) ,2) AS cena_sleva, k.sleva, k.popis, k.image, k.vaha,
        pr.nazev, po.nazev, od.nazev, re.nazev, st.nazev, zp.nazev, ze.nazev, co.avg_rating
        FROM Kava AS k
        LEFT JOIN prazirna AS pr           ON pr.id = k.id_prazirna
        LEFT JOIN pouziti AS po            ON po.id = k.id_pouziti
        LEFT JOIN odruda AS od             ON od.id = k.id_odruda
        LEFT JOIN region AS re             ON re.id = k.id_region
        LEFT JOIN stupen_prazeni AS st     ON st.id = k.id_stupen_prazeni
        LEFT JOIN zpusob_zpracovani AS zp  ON zp.id = k.id_zpusob_zpracovani
        LEFT JOIN zeme_puvodu AS ze        ON ze.id = k.id_zeme
        LEFT JOIN coffee_with_rating AS co ON co.id = k.id
        WHERE k.id = <id>
        */

        if($re = $this->db->execute($query)) {
            if($re->num_rows == 1) {
                return $this->turnToJson($re);
            }else {
                //No coffee with this ID
                return false;
            }
        }

        return $query;
    }


}

?>