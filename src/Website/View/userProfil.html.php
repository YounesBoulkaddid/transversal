<?php
/**
 * Created by PhpStorm.
 * User: Younes
 * Date: 21/05/15
 * Time: 23:50
 */
echo '
    <div>
        <h1>'.$request['session']['user']['lastname'].'</h1>
        <h2>'.$request['session']['user']['firstname'].'</h2>
        <h3>'.$request['session']['user']['birthday'].'</h3>
    </div>
    <div>
        <h1>'.$request['session']['user']['email'].'</h1>
<form action="?p=show_profilUser" method="post">
        <input type="text" name="adress" value="'.$request['session']['user']['adress'].'">
        <input type="text" name="postalCode" value="'.$request['session']['user']['postalCode'].'">
        <input type="text" name="city" value="'.$request['session']['user']['city'].'">
        <input type="submit">
</form>
    </div>
     <div>
        <h1>'.$request['session']['user']['subscription']['name'].'</h1>
        <h1>'.$request['session']['user']['subscription']['price'].'€/'.$request['session']['user']['subscription']['monthlyPayment'].'mois</h1>
        <h1></h1>
    </div>
';
?>

