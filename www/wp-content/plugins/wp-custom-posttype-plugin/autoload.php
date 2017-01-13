<?php
/**
 * Created by Rafael Silveira.
 * User: rsilveira
 * Date: 13/01/17
 * Time: 22:34
 */

$iterator = new RecursiveDirectoryIterator(__DIR__ . "/classes/");

foreach (new RecursiveIteratorIterator($iterator) as $fileName => $current) {
    if (!is_file($fileName)) {
        continue;
    }

    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    if ($ext != 'php') {
        continue;
    }

    include_once($fileName);
}
