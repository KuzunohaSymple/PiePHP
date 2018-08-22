<?php
class UserModel extends Database  {
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->bdd = $GLOBALS['bdd'];
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function save() {
        
        $sql = "INSERT INTO users (email, password) VALUES (:mail, :password)";
        $result_sql = $this->bdd->prepare($sql);
        $result_sql->bindParam(':mail', $this->email, PDO::PARAM_STR);
        $result_sql->bindParam(':password', $this->password, PDO::PARAM_STR);
        $result_sql->execute();
        $result_sql->closeCursor();
        $this->create($this->email, $this->password);
    }

    public function create($mail, $password) {
        $sql = "INSERT INTO users (email, password) VALUES (:mail, :password)";
        $result_sql = $this->bdd->prepare($sql);
        $result_sql->bindParam(':mail', $mail, PDO::PARAM_STR);
        $result_sql->bindParam(':password', $password, PDO::PARAM_STR);
        $result_sql->execute();
        $id_user = $this->bdd->lastInsertId(); //récupère le dernier id insere
        $this->read($id_user);
        $this->read_all($id_user);
        $result_sql->closeCursor();
        return $id_user;
    }

    public function read($id) {
        $sql = "SELECT * FROM users WHERE id=:id";
        $result_id = $this->bdd->prepare($sql);
        $result_id->bindParam('id', $id, PDO::PARAM_INT);
        $result_id->execute();
        $result = $result_id->fetchAll();
        foreach ($result as $key => $element) {
//            echo $element['id'] . " " .$element['email'] . " " . $element['password'];
        }
        $result_id->closeCursor();
    }

    public function update($id, $name_column, $new_value) {
        $sql = "UPDATE users SET $name_column=:val WHERE id=:id";
        $result_update = $this->bdd->prepare($sql);
        $result_update->bindParam(':val', $new_value, PDO::PARAM_STR);
        $result_update->bindParam('id', $id, PDO::PARAM_INT);
        $result_update->execute();
        $result_update->closeCursor();

    }

    public function delete($id) {
        $sql = "DELETE FROM `users` WHERE id=:id";
        $result_id = $this->bdd->prepare($sql);
        $result_id->bindParam('id', $id, PDO::PARAM_INT);
        $result_id->execute();
        $result_id->closeCursor();
    }

    public function read_all($id) {
        $sql = "SELECT * FROM users WHERE id=:id";
        $result_id = $this->bdd->prepare($sql);
        $result_id->bindParam('id', $id, PDO::PARAM_INT);
        $result_id->execute();
        $result = $result_id->fetchAll();
        foreach ($result as $key => $element) {
//            echo $element['id'] . " " .$element['email'] . " " . $element['password'];
        }
        $result_id->closeCursor();
    }
}

