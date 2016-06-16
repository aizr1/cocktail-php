<?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>

<!-- register form -->
<form method="post" action="register.php" name="registerform">

    <!-- the nutzer name input field uses a HTML5 pattern check -->
    <label for="login_input_nutzername">nutzername (only letters and numbers, 2 to 64 characters)</label>
    <input id="login_input_nutzername" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="nutzer_name" required />

    <!-- the email input field uses a HTML5 email type check -->
    <label for="login_input_email">nutzer's email</label>
    <input id="login_input_email" class="login_input" type="email" name="nutzer_email" required />

    <label for="login_input_password_new">Password (min. 6 characters)</label>
    <input id="login_input_password_new" class="login_input" type="password" name="nutzer_password_new" pattern=".{6,}" required autocomplete="off" />

    <label for="login_input_password_repeat">Repeat password</label>
    <input id="login_input_password_repeat" class="login_input" type="password" name="nutzer_password_repeat" pattern=".{6,}" required autocomplete="off" />
    <input type="submit"  name="register" value="Register" />

</form>

<!-- backlink -->
<a href="index.php">Back to Login Page</a>
