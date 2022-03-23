<?php
/**
 * @file    users.php
 * @brief   controller for the users
 * @author  Created by Gabriel.GLOOR
 * @version 09.02.2022
 */

require 'model/UserManager.php';

/**
 * @param $loginRequest
 * @return void
 */
function login ($loginRequest){
    if (isset($loginRequest['email']) && (isset($loginRequest['userPswd']))){

        $inputUserEmail = $loginRequest['email'];
        $inputUserPsw = $loginRequest['userPswd'];

        //try to check if user email and password match
        if (isLoginCorrect($inputUserEmail, $inputUserPsw)){

            //création d'une session
            $_SESSION['userEmailAddress']=$inputUserEmail;
            userType($inputUserEmail);
        }else{

            $loginErrorMessage="Le mail et/ou le mot de passe ne correspondent pas";
            require "view/login.php";
        }

    }else{

        $loginErrorMessage="Le mail et/ou le mot de passe ne sont pas rempli(s)";
        require "view/login.php";
    }
}

function logout(){
    unset($_SESSION['userEmailAddress']);
    session_destroy();
    require "view/home.php";
}

function register($userInfos){
    if ($userInfos['Remail'] != "" && $userInfos['RuserPswd'] != "" && $userInfos['RuserPswdCk'] != ""){

        $newUserEmail = $userInfos['Remail'];
        $newUserPsw = $userInfos['RuserPswd'];
        $newUserPswCheck = $userInfos['RuserPswdCk'];

        if (userExist($newUserEmail)){

            if($newUserPsw == $newUserPswCheck){
                registerUser($newUserEmail, $newUserPsw);
                header("Location: ?action=login&registration=true");
            }else{
                $registerErrorMessage="Les mots de passes ne correspondent pas";
                require "view/register.php";
            }
        }else{
            $registerErrorMessage="L'email existe déjà'";
            require "view/register.php";
        }

    }else{
        if (($userInfos['Remail'] != "" || $userInfos['RuserPswd'] != "" || $userInfos['RuserPswdCk'] != "")){
            $registerErrorMessage = "L'email et/ou les mots de passe ne sont pas remplis";
        }
        require "view/register.php";
    }
}
