<?php

        namespace Testdir\Interface

        interface DBInterface { 

                public function insertData(array $data);

                public function selectData(array $data); 



        }



        class DBUtils implements DBInterface {

                public function insertData(array $data) { }

                public function selectData(array $data) { }

}
