<?php
class Request {
    private $request_get;
    private $request_post;

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

    public function getQueryParams() {
        $post = $this->request_post;
        $get = $this->request_get;
        return array($post, $get);
    }
}

//$foo = new Request();