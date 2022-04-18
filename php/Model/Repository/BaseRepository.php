<?php


    abstract class BaseRepository {
        protected $db;

        public function __construct() {
            $this->db = new Database();
        }

        protected function turnToJson($resource) {
            $arr = array();
            while($row = $resource->fetch_assoc()) {
                $arr[] = $row;
            }
            return json_encode($arr);
        }
    }
?>