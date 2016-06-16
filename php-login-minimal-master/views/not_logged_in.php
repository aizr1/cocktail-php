<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- login form box -->
<form method="post" action="index.php" name="loginform">

    <label for="login_input_nutzername">nutzername</label>
    <input id="login_input_nutzername" class="login_input" type="text" name="nutzer_name" required />

    <label for="login_input_password">Password</label>
    <input id="login_input_password" class="login_input" type="password" name="nutzer_password" autocomplete="off" required />

    <input type="submit"  name="login" value="Log in" />

</form>

<a href="register.php">Register new account</a>
