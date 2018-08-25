<?php
class ORM extends Database {
    public function create($table, $fields) {
        $colonne = "";
        $ligne ="";
        foreach ($fields as $key => $element) {
            $colonne .= $key . ", ";
            $ligne .= "'" . $element . "'" . ", ";
        }

        $colonne = substr($colonne, 0, -2);
        $ligne = substr($ligne, 0, -2);

        $sql = "INSERT INTO $table ( $colonne ) VALUES ($ligne)";
        $request = $GLOBALS['bdd']->prepare($sql);
        $request->execute();
        $id_user = $GLOBALS['bdd']->lastInsertId(); //récupère le dernier id insere
        $request->closeCursor();

        return $id_user;
    }

    public function read($table, $id) {
        $sql = "SELECT * from $table WHERE id=\"$id\"";
        $result = $GLOBALS['bdd']->prepare($sql);
        $result->execute();
        $resultat = $result->fetchAll();
        $result->closeCursor();

        return $resultat;
    }

    public function update($table, $id, $fields) {
        $colonne_valeur = "";

        foreach ($fields as $key => $element) {
            $colonne_valeur .= " " . $key . " = " . "'" . $element . "',";
        }

        $colonne_valeur = substr($colonne_valeur, 0, -1);
        $sql = "UPDATE $table SET $colonne_valeur WHERE id=\"$id\"";
        $request = $GLOBALS['bdd']->prepare($sql);
        $request->execute();
        $request->closeCursor();

        return true;
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM `$table` WHERE id=\"$id\"";
        $result = $GLOBALS['bdd']->prepare($sql);
        $result->execute();
        $result->closeCursor();
        return true;
    }

    public function find($table, $params = array(
        'WHERE' => '1',
        'ORDER BY' => 'id ASC',
        'LIMIT' => ''
    )) {
        $value = "";
        foreach ($params as $key => $element) {
            if (!empty($element)) {
                $value .= $key . " " . $element . " ";
            }
            else {
                $key = null;
            }
        }

        $sql = "SELECT * FROM $table $value";
        $sql = substr($sql, 0, -1);

        $request = $GLOBALS['bdd']->prepare($sql);
        $request->execute();
        $result = $request->fetchAll();
        $request->closeCursor();

        return $result;
    }

}

//$orm = new ORM();
//$orm->create('users', array(
//    'email' => "barbara@barbara",
//    'password' => 'barbara',
//));
//$orm->update('users', 2, array(
//    'email' => "un super titre",
//    'password' => 'et voici un super article de blog',
//));
//$orm->delete('users', 2);
//$orm->find('users');