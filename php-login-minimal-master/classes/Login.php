<?php

/**
 * Class login
 * handles the nutzer's login and logout process
 */
class Loginnutzer
{
    /**
     * @var object The database connection
     */
    private $db_connection = null;
    /**
     * @var array Collection of error messages
     */
    public $errors = array();
    /**
     * @var array Collection of success / neutral messages
     */
    public $messages = array();

    /**
     * the function "__construct()" automatically starts whenever an object of this class is created,
     * you know, when you do "$login = new Login();"
     */
    public function __construct()
    {
        // create/read session, absolutely necessary
        session_start();

        // check the possible login actions:
        // if nutzer tried to log out (happen when nutzer clicks logout button)
        if (isset($_GET["logout"])) {
            $this->doLogout();
        }
        // login via post data (if nutzer just submitted a login form)
        elseif (isset($_POST["login"])) {
            $this->dologinWithPostData();
        }
    }

    /**
     * log in with post data
     */
    private function dologinWithPostData()
    {
        // check login form contents
        if (empty($_POST['nutzer_name'])) {
            $this->errors[] = "nutzername field was empty.";
        } elseif (empty($_POST['nutzer_password'])) {
            $this->errors[] = "Password field was empty.";
        } elseif (!empty($_POST['nutzer_name']) && !empty($_POST['nutzer_password'])) {

            // create a database connection, using the constants from config/db.php (which we loaded in index.php)
            $this->db_connection = new mysqli(DB_HOST, DB_nutzer, DB_PASS, DB_NAME);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escape the POST stuff
                $nutzer_name = $this->db_connection->real_escape_string($_POST['nutzer_name']);

                // database query, getting all the info of the selected nutzer (allows login via email address in the
                // nutzername field)
                $sql = "SELECT nutzer_name, nutzer_email, nutzer_password_hash
                        FROM nutzers
                        WHERE nutzer_name = '" . $nutzer_name . "' OR nutzer_email = '" . $nutzer_name . "';";
                $result_of_login_check = $this->db_connection->query($sql);

                // if this nutzer exists
                if ($result_of_login_check->num_rows == 1) {

                    // get result row (as an object)
                    $result_row = $result_of_login_check->fetch_object();

                    // using PHP 5.5's password_verify() function to check if the provided password fits
                    // the hash of that nutzer's password
                    if (password_verify($_POST['nutzer_password'], $result_row->nutzer_password_hash)) {

                        // write nutzer data into PHP SESSION (a file on your server)
                        $_SESSION['nutzer_name'] = $result_row->nutzer_name;
                        $_SESSION['nutzer_email'] = $result_row->nutzer_email;
                        $_SESSION['nutzer_login_status'] = 1;

                    } else {
                        $this->errors[] = "Wrong password. Try again.";
                    }
                } else {
                    $this->errors[] = "This nutzer does not exist.";
                }
            } else {
                $this->errors[] = "Database connection problem.";
            }
        }
    }

    /**
     * perform the logout
     */
    public function doLogout()
    {
        // delete the session of the nutzer
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "You have been logged out.";

    }

    /**
     * simply return the current state of the nutzer's login
     * @return boolean nutzer's login status
     */
    public function isnutzerLoggedIn()
    {
        if (isset($_SESSION['nutzer_login_status']) AND $_SESSION['nutzer_login_status'] == 1) {
            return true;
        }
        // default return
        return false;
    }
}
