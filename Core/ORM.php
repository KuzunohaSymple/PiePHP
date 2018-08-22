<?php
class ORM extends Database {
    public function create($table, $fields) {
//        var_dump($fields);
        $sql = "INSERT INTO $table ($colonne)";
        $colonne = "";
        $ligne ="";
        foreach ($fields as $key => $element) {
            $colonne .= $key . ", ";
            $ligne .= $element;
        }
        $colonne -= ",";
//        var_dump($sql);
//        $sql = "INSERT INTO table (nom_colonne_1, nom_colonne_2) VALUES ('valeur 1', 'valeur 2')";
        //retourne un id
//        echo "oui";

    }

    public function read($table, $id) {
        $sql = "SELECT * from $table WHERE id=\"$id\"";
        $result = $GLOBALS['bdd']->prepare($sql);
        $result->execute();
        $resultat = $result->fetchAll();
        foreach ($resultat as $key => $element) {
//            echo $element['id'] . " " .$element['email'] . " " . $element['password'];
        }
        $result->closeCursor();
    }

    public function update($table, $id, $fields) {
        //retourne un booléen
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM `$table` WHERE id=\"$id\"";
        $result = $GLOBALS['bdd']->prepare($sql);
        $result->execute();
        $result->closeCursor();
        return true;
        //retourne un booléen
    }

    public function find($table, $params = array(
//        $sql = "SELECT * FROM $table WHERE ";
        'WHERE' => '1',
        'ORDER BY' => 'id ASC',
        'LIMIT' => ''
    )) {
        //retourne un tableau d'enregistrement
    }

}

//$orm = new ORM();
//$orm->create('users', array(
//    'email' => "un@supertitre",
//    'password' => 'article de blog',
////    'author' => 'Rodrigue'
//));
//$orm->update('articles', 1, array(
//    'titre' => "un super titre",
//    'content' => 'et voici un super article de blog',
//    'author' => 'Rodrigues'
//));
//$orm->delete('articles', 1);