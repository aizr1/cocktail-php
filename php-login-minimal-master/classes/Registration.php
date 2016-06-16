<?php

/**
 * Class registration
 * handles the nutzer registration
 */
class Registration
{
    /**
     * @var object $db_connection The database connection
     */
    private $db_connection = null;
    /**
     * @var array $errors Collection of error messages
     */
    public $errors = array();
    /**
     * @var array $messages Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$registration = new Registration();"
     */
    public function __construct()
    {
        if (isset($_POST["register"])) {
            $this->registerNewnutzer();
        }
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new nutzer in the database if everything is fine
     */
    private function registerNewnutzer()
    {
        if (empty($_POST['nutzer_name'])) {
            $this->errors[] = "Empty nutzername";
        } elseif (empty($_POST['nutzer_password_new']) || empty($_POST['nutzer_password_repeat'])) {
            $this->errors[] = "Empty Password";
        } elseif ($_POST['nutzer_password_new'] !== $_POST['nutzer_password_repeat']) {
            $this->errors[] = "Password and password repeat are not the same";
        } elseif (strlen($_POST['nutzer_password_new']) < 6) {
            $this->errors[] = "Password has a minimum length of 6 characters";
        } elseif (strlen($_POST['nutzer_name']) > 64 || strlen($_POST['nutzer_name']) < 2) {
            $this->errors[] = "nutzername cannot be shorter than 2 or longer than 64 characters";
        } elseif (!preg_match('/^[a-z\d]{2,64}$/i', $_POST['nutzer_name'])) {
            $this->errors[] = "nutzername does not fit the name scheme: only a-Z and numbers are allowed, 2 to 64 characters";
        } elseif (empty($_POST['nutzer_email'])) {
            $this->errors[] = "Email cannot be empty";
        } elseif (strlen($_POST['nutzer_email']) > 64) {
            $this->errors[] = "Email cannot be longer than 64 characters";
        } elseif (!filter_var($_POST['nutzer_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Your email address is not in a valid email format";
        } elseif (!empty($_POST['nutzer_name'])
            && strlen($_POST['nutzer_name']) <= 64
            && strlen($_POST['nutzer_name']) >= 2
            && preg_match('/^[a-z\d]{2,64}$/i', $_POST['nutzer_name'])
            && !empty($_POST['nutzer_email'])
            && strlen($_POST['nutzer_email']) <= 64
            && filter_var($_POST['nutzer_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['nutzer_password_new'])
            && !empty($_POST['nutzer_password_repeat'])
            && ($_POST['nutzer_password_new'] === $_POST['nutzer_password_repeat'])
        ) {
            // create a database connection
            $this->db_connection = new mysqli(DB_HOST, DB_nutzer, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escaping, additionally removing everything that could be (html/javascript-) code
                $nutzer_name = $this->db_connection->real_escape_string(strip_tags($_POST['nutzer_name'], ENT_QUOTES));
                $nutzer_email = $this->db_connection->real_escape_string(strip_tags($_POST['nutzer_email'], ENT_QUOTES));

                $nutzer_password = $_POST['nutzer_password_new'];

                // crypt the nutzer's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
                $nutzer_password_hash = password_hash($nutzer_password, PASSWORD_DEFAULT);

                // check if nutzer or email address already exists
                $sql = "SELECT * FROM nutzers WHERE nutzer_name = '" . $nutzer_name . "' OR nutzer_email = '" . $nutzer_email . "';";
                $query_check_nutzer_name = $this->db_connection->query($sql);

                if ($query_check_nutzer_name->num_rows == 1) {
                    $this->errors[] = "Sorry, that nutzername / email address is already taken.";
                } else {
                    // write new nutzer's data into database
                    $sql = "INSERT INTO nutzers (nutzer_name, nutzer_password_hash, nutzer_email)
                            VALUES('" . $nutzer_name . "', '" . $nutzer_password_hash . "', '" . $nutzer_email . "');";
                    $query_new_nutzer_insert = $this->db_connection->query($sql);

                    // if nutzer has been added successfully
                    if ($query_new_nutzer_insert) {
                        $this->messages[] = "Your account has been created successfully. You can now log in.";
                    } else {
                        $this->errors[] = "Sorry, your registration failed. Please go back and try again.";
                    }
                }
            } else {
                $this->errors[] = "Sorry, no database connection.";
            }
        } else {
            $this->errors[] = "An unknown error occurred.";
        }
    }
}
