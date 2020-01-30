<?php

    abstract class Dbtable
    {
        protected $tableName;

        protected $primaryKey;

        protected $pdo;

        public function __construct(string $_tableName, string $_pk)
        {
            $$this->tableName = $_tableName;
            $$this->primaryKey = $_pk;
            $this->pdo = DbConnect::getDb();
        }

        abstract static public function select(int $id);

        abstract static public function selectAll();

        // abstract static public function insert();

        // abstract static public function update();

        // abstract static public function delete();


    }    