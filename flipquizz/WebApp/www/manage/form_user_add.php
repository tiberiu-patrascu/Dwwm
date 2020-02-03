<h2>Liste Manager</h2>

<?php
    require_once dirname(__DIR__,2).'/Loader.php';

    $accounts = new Models\AccountManager;

    //boucle plus rapide que while
    //copie du tableau
    foreach($accounts->getAccounts() as $user )
    {
        // echo '<pre>';
        // echo $user['username'];
        // echo '</pre>';
?>

<div class="">
    <?=$user['username'];?> : <?=$user['email'];?>
</div>

<?php

    }
    
?>

<h2>Add User</h2>

<?php
session_start();

if (!empty($_SESSION['error'])) {
    echo $_SESSION['error'];
    //toujour mettre a null pour vider la session
    $_SESSION['error'] = null;
    //unset'$_SESSION['error'];
}

if (!empty($_SESSION['success'])) {
    echo $_SESSION['success'];
    $_SESSION['success'] = null;
}

?>

<form action="form_add_user_save.php" method="POST">
    <label for="username">User name</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
    <br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
    <br>
    <input type="submit" value="Valid">
</form>