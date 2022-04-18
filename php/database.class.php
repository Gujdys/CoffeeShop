<?php

class Database {

    private $host;
    private $name;
    private $pass;
    private $db;
    public $conn;

    public function __construct() {
        $this->host = "localhost";
        $this->name = "root";
        $this->pass = "";
        $this->db = "shop";
        if ( $this->conn = $this->connect() ) {
        }else {
           echo "error";
        }
    }

    private function connect() {
        $c = new mysqli($this->host,$this->name,$this->pass,$this->db);
        if ($c) {
            return $c;
        }else {
            return false;
        }
    }

    public function execute($sql) {
        if($re = $this->conn->query($sql)) {
            return $re;
        }else {
            return false;
        }
    }

    public function selectCoffe() {
        $this->conn->query("SET NAMES UTF8");
        $sql = "SELECT k.id, k.nazev, k.cena, k.popis, k.vaha, k.id_prazirna, k.id_zeme, k.id_region, k.id_odruda, k.id_pouziti, k.id_zpusob_zpracovani, k.id_stupen_prazeni, o.nazev AS odruda_nazev, z.nazev AS zeme_nazev, p.nazev AS prazirna_nazev, r.nazev AS region_nazev, po.nazev AS pouziti_nazev, zp.nazev AS zpracovani_nazev
        FROM kava AS k LEFT JOIN odruda AS o ON k.id_odruda=o.id LEFT JOIN zeme_puvodu AS z ON k.id_zeme=z.id LEFT JOIN prazirna AS p ON k.id_prazirna=p.id LEFT JOIN region AS r ON k.id_region=r.id LEFT JOIN pouziti AS po ON k.id_pouziti=po.id LEFT JOIN zpusob_zpracovani AS zp ON k.id_zpusob_zpracovani=zp.id GROUP BY k.id";
;

        if($que = $this->conn->query($sql)) {
            if($que->num_rows > 0) {
                return $que;
            }else {
                echo "chyba 1";
            }
        }else {
            echo "chyba 2";
        }
    }


}

?>