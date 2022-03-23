<?php
/**
 * @file    dbConnector.php
 * @brief   connection to the DB
 * @author  Created by Gabriel.GLOOR
 * @version 09.02.2022
 */

/**
 * @param $query
 * @return null
 * @return $queryResult
 */
function executeQuerySelect($query){

    $queryResult = null ;
    $dbConnection = openDBConnection();
    if ($dbConnection !=null){
        $statement=$dbConnection->prepare($query); //Query prepare
        $statement->execute(); // Execute query
        $queryResult = $statement->fetchAll(); //prepare results for client
    }

    $dbConnection = null; //close connection for security
    return  $queryResult;

}

/**
 * @return PDO|null
 */
function openDBConnection (){

    $tempDBConnection =null;
    $sqlDriver='mysql';
    $hostname='localhost';
    $port=3306;
    $charset='utf8';
    $dbName='snows';
    $username='appliConnector';
    $userPsw='123qweasdD!';
    $dsn=$sqlDriver.':host='.$hostname.';dbname='.$dbName.';port='.$port.'chrset='.$charset;

    try {
        $tempDBConnection =new PDO($dsn, $username, $userPsw);
    }catch (PDOException $exception){
        echo 'Connection failed'.$exception->getMessage();
    }
    return $tempDBConnection;
}

//class for exception' management
class ModelDataException{

}

/**
 * @param $query
 * @return void
 */
function executeQueryInsert ($query){
    $dbConnection = openDBConnection();
    if ($dbConnection !=null){
        $statement=$dbConnection->prepare($query); //Query prepare
        $statement->execute(); // Execute query
        $queryResult = $statement->fetchAll(); //prepare results for client
    }

    $dbConnection = null; //close connection for security
}