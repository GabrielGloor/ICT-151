<?php
/**
 * @file    articles.php
 * @brief   FILE DESCRIPTION
 * @author  Created by Gabriel.GLOOR
 * @version 02.03.2022
 */

/**
 * @brief This function is designed to get display active articles
 * @return void
 */
function displayArticles (){
    try {
        //look for datas in database
        require_once "model/articlesManager.php";
        $articles = getArticles();
    }
    catch (ModelDatabaseException $ex){
        $artcleErrorMessage="Nous rencontrons temporairement un problème technique. Veuillez réessayer plus tard";
    } finally {
        require "view/articles.php";
    }
}