<?php

    class DiskografijaDvd extends DbOptions {
        protected static $db_table = "diskografija_dvd";
        protected static $db_table_fields = array('id', 'pavadinimasLt', 'pavadinimasEn', 'pavadinimasFr', 'nuotrauka', 'aprasymasLt', 'aprasymasEn', 'aprasymasFr');
        public $id;
        public $pavadinimasLt;
        public $pavadinimasEn;
        public $pavadinimasFr;
        public $nuotrauka;
        public $aprasymasLt;
        public $aprasymasEn;
        public $aprasymasFr;
        
    }

?>