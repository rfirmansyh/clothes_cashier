<?php
    // extend model = template
    abstract class Model {
        protected $table = "";
        protected $db = null;
        public $props = [];

        protected function __construct() 
        {
            $this->db = new Database;

            $table_colums = $this->db->query("DESCRIBE $this->table");
            $table_colums = $this->db->fetchall();

            foreach ($table_colums as $i => $table_colum) {
                $this->props["$table_colum->Field"] = null;
            }
            
            $this->db->query('');
        }

        public function all()
        {
            $this->db->query("SELECT * FROM $this->table");
            return $this->db->fetchall();
        }

        public function where($columnName = "", $expression = "", $columnData = "")
        {
            $query = "";
            if ($columnName && $expression && $columnData) {
                $query = "SELECT * FROM `$this->table` WHERE `$columnName` $expression $columnData";
            } else {
                $query = "SELECT * FROM `$this->table`";
            }
            
            $this->db->query($query);
            return $this;
        }

        public function first()
        {
            return $this->db->fetch();
        }

        public function get()
        {
            if (strlen($this->db->getstmt()->queryString) < 1) {
                $this->db->query("SELECT * FROM `$this->table`");
            }
            return $this->db->fetchall();
        }

        public function save()
        {
            $query = "";
            // if has id, update it, else insert it
            if (isset($this->props['id']) && strlen($this->props['id']) > 0 && !is_null($this->props['id'])) {

                $query = "UPDATE `clothes` SET ";
                $i = 0;
                foreach($this->props as $prop => $value) { 
                    ++$i;
                    if ($prop === 'id') {
                        // if ( ++$i < count($this->props) ) {
                        //     $query .= "`$prop`=NULL,";
                        // } else {
                        //     $query .= "`$prop`=NULL);";
                        // }
                        continue;
                    } else {
                        if ( $i < count($this->props) ) {
                            $query .= "`$prop`=:$prop,";
                        } else {
                            $query .= "`$prop`=:$prop "; 
                        }
                    }
                }
                $query .= 'WHERE `id` = '.$this->props['id'].';';

            } else {

                $query = "INSERT INTO `$this->table` (";
                $i = 0;
                foreach($this->props as $prop => $value) { 
                    ( ++$i < count($this->props) ) ?  $query .= "`$prop`," : $query .= "`$prop`"; 
                }

                $query .= ") VALUES (";
                $i = 0;
                foreach($this->props as $prop => $value) { 
                    if ($prop === 'id') {
                        if ( ++$i < count($this->props) ) {
                            $query .= "NULL,";
                        } else {
                            $query .= "NULL);";
                        }
                    } else {
                        if ( ++$i < count($this->props) ) {
                            $query .= ":$prop,";
                        } else {
                            $query .= ":$prop);"; 
                        }
                    }
                }

            }

            $this->db->query($query);
            foreach($this->props as $prop => $value) { 
                if ($prop != 'id') { $this->db->bind($prop, $value); }
            }

            // var_dump($this->db->getstmt());
            // die;
            $this->db->execute();
        }

        // switch status 0/1 or active/inactive : it's work if column table enum('0','1')
        public function switchstatus($type = false)
        {
            $query = "";
            if ($type) {
                $query .= 'UPDATE `'.$this->table.'` SET `status` = "1" WHERE `id` = '.$this->props['id'].';';
            } else {
                $query .= 'UPDATE `'.$this->table.'` SET `status` = "0" WHERE `id` = '.$this->props['id'].';';
            }
            $this->db->query($query);
            $this->db->execute();
        }

        public function getlastid() 
        {
            return $this->db->lastInsertId();
        }

    }