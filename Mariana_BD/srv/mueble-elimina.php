<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/delete.php";
require_once __DIR__ . "/../lib/php/devuelveNoContent.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_MUEBLE.php";

ejecutaServicio(function () {
 $id = recuperaIdEntero("id");
 delete(pdo: Bd::pdo(), from: MUEBLE, where: [MUE_ID => $id]);
 devuelveNoContent();
});