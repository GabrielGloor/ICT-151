<?php
/**
 * @file    articlesManager.php
 * @brief   FILE DESCRIPTION
 * @author  Created by Gabriel.GLOOR
 * @version 02.03.2022
 */
/**
 * @brief This function is designed to get all active articles
 * @return null containing all informations about the articles. Array cannot be empty
 */
function getArticles(){
    //QUery to get articles in BD
    $snowQuery='SELECT code, brand, model, snowLength, price, qtyAvailable, photo, active FROM snows';
    require_once 'model/dbConnector.php';

    //return snows to controller
    return executeQuerySelect($snowQuery);
}

function articlesDetails(){

}