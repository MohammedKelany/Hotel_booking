<?php require __DIR__ . "/database.php"; ?>

<?php

class AdminAuthDB extends Database
{
    public function register($username, $password, $email)
    {
        $check = $this->conn->prepare("SELECT COUNT(*) AS num FROM admins WHERE name=:name OR email=:email");
        $check->bindValue("name", $username);
        $check->bindValue("email", $email);
        $check->execute();
        $num = $check->fetch(PDO::FETCH_ASSOC);
        if ($num["num"] == 0) {
            $statement = $this->conn->prepare("INSERT INTO admins(name,password,email) VALUES(:name,:password,:email)");
            $statement->bindValue("name", $username);
            $statement->bindValue("password", sha1($password));
            $statement->bindValue("email", $email);
            $statement->execute();
            header("Location: login-admins.php");
        }
    }
    public function login($password, $email)
    {
        $statement = $this->conn->prepare(" SELECT * , COUNT(*) AS number FROM admins WHERE password=:password AND email=:email");
        $statement->bindValue("password", sha1($password));
        $statement->bindValue("email", $email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if ($user["number"]) {
            $_SESSION["username"] = $user["name"];
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["email"] = $user["email"];
            header("Location: ../index.php");
        }
    }
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: http://localhost/hotel-booking/admin-panel/admins/login-admins.php");
    }
}
$authDB = new AdminAuthDB();
?>