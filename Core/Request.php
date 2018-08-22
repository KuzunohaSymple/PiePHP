<?php
class Request {

    public function __construct() {
        if (!empty($_GET)) {
            foreach ($_GET as $key => $element) {
              $this->request_get = stripslashes(trim(htmlspecialchars($element)));
            }
        }
        if (!empty($_POST)) {
            foreach ($_POST as $kley => $elements) {
                $this->request_post = stripslashes(trim(htmlspecialchars($elements)));
            }
        }
    }
}

//$foo = new Request();