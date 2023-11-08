<?php
    function getConnection(){
    return pg_connect("host=localhost dbname=tdiw-b5 
        user=postgres password=Oliverta2");
}
?>