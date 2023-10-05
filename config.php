<?php

define("DSN", "mysql:host=localhost;dbname=compact-track;port=3306;charset=utf8");
define("USERNAME", "root");
define("PASSWORD", "");

function handleConnection(){
    $PDO = new PDO(DSN, USERNAME, PASSWORD);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $PDO;
    
}

function request($sql, $params = null){
    $PDO = handleConnection();
    $query = $PDO->PREPARE($sql);

    if($params == null){
        $query->execute();
    }else{
        $query->execute($params);
    }
    return $query;
}
?>