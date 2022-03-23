<?php
/**
 * @file    login.php
 * @brief   FILE DESCRIPTION
 * @author  Created by Gabriel.GLOOR
 * @version 09.02.2022
 */
ob_start();
$title = 'login';
?>
<!-- content page -->
<section class="bgwhite p-t-66 p-b-60">
    <div class="container">
        <div class="row">

            <div class="col-md-12 p-b-30">
                <form class="leave-comment" METHOD="post" action="index.php?action=login">
                    <h4 class="m-text26 p-b-36 p-t-15">
                        Connectez-vous
                    </h4>

                    <?php if(isset($_GET['registration'])&& $_GET['registration']==true)echo '<a style="color: limegreen">'.'Vous avez bien été enregisté'.'</a>';?>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="email" name="email" placeholder="Adresse email">
                    </div>

                    <div class="bo4 of-hidden size15 m-b-20">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="userPswd" placeholder="Mot de passe">
                    </div>

                    <?php if(isset($loginErrorMessage)) echo '<a style="color: red">'.$loginErrorMessage.'</a>' ?>

                    <input type="submit" value="login" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4"><br>
                    <input type="reset" value="Annuler" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">

                </form>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require 'view/gabarit.php';