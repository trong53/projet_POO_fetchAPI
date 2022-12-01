<?php

$GLOBALS['ROOT_DOCUMENT'] = dirname(__FILE__);

function getUri() {
    return explode("?", $_SERVER['REQUEST_URI'])[0];
}

function render(string $path, array $data=[]) {
    $APP = 'app';
    $pathArray = explode('.', $path);
    $file = ucfirst($pathArray[1]).ucfirst(rtrim($pathArray[0],'s')).'.php';
    $folder = ucfirst($pathArray[0]);
    require './'.$APP.'/'.$folder.'/'.$file;
}












/*   use - trait
<?php
class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
?>
*/