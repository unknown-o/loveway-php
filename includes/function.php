<?php

function pdoConnect(){
    return new PDO('mysql:host=' . $GLOBALS['DB_HOST'] . ';dbname=' . $GLOBALS['DB_NAME'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASS']);
}

function getInfo($name)
{
    try{
        $pdo = pdoConnect();
        $stmt = $pdo->prepare("select * from loveway_config where name = ?");
        $stmt->bindValue(1,$name);
        if($stmt->execute()){
            $rows = $stmt->fetchAll();
            return $rows[0]['value'];
        } else {
            return 'database connection failed';
        }
    } catch (Exception $e) {
        return 'database connection failed';
        //echo $e->getMessage();
    }
}
?>
