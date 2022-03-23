<?php
/**
 * @file    UserManager.php
 * @brief   Management of the users
 * @author  Created by Gabriel.GLOOR
 * @version 09.02.2022
 */

require "model/dbConnector.php";

/**
 * @param $userEmail
 * @param $userPsw
 * @return false
 */
function isLoginCorrect($userEmail, $userPsw){

    $result = false;

    $strSeparator = '\'';

    //query to check the user's inputs
    $loginQuery = 'SELECT userEmailAddress, userHashPsw FROM users WHERE userEmailAddress='.$strSeparator.$userEmail.$strSeparator. 'AND userHashPsw='.$strSeparator.$userPsw.$strSeparator;

    //Execute query
    $queryResult = executeQuerySelect($loginQuery);

    if (count($queryResult)==1){
        $result = 1;
    }

    return $result;
}

/**
 * @param $userEmail
 * @return false|int
 */
function userExist ($userEmail) {
    $result = false;

    $strSeparator = '\'';

    //query to check the user's inputs
    $registerQuery = 'SELECT userEmailAddress FROM users WHERE userEmailAddress='.$strSeparator.$userEmail.$strSeparator;

    //Execute query
    $queryResult = executeQuerySelect($registerQuery);

    if (empty($queryResult)){
        $result = 1;
        return $result;
    }else{
        return $result;
    }

}

/**
 * @param $userEmail
 * @param $userPsw
 * @return void
 */
function registerUser ($userEmail, $userPsw){
    $strSeparator = '\'';

    //query to check the user's inputs
    $registerQuery = 'INSERT INTO users (userEmailAddress, userHashPsw) VALUES ('.$strSeparator.$userEmail.$strSeparator.', '.$strSeparator.$userPsw.$strSeparator.')';
    $executeQuery = executeQueryInsert($registerQuery);

}

function userType($userEmail){
    $strSeparator = '\'';

    //querry to know the type of the user
    $typeOfTheUser = 'SELECT userType FROM users WHERE userEmailAddress='.$strSeparator.$userEmail.$strSeparator;
    $queryResult = executeQuerySelect($typeOfTheUser);

    if($typeOfTheUser == 0){
        return false;
    }
}