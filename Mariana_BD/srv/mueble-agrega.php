<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaMaterial.php";
require_once __DIR__ . "/../lib/php/validaCategoria.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_MUEBLE.php";

ejecutaServicio(function () {

 $nombre = recuperaTexto("nombre");
 $categoria = recuperaTexto("categoria");
 $material = recuperaTexto("material");
 $nombre = validaNombre($nombre);
 $categoria = validaCategoria( $categoria);
 $material = validaMaterial($material);


 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: MUEBLE, values: [MUE_NOMBRE => $nombre, MUE_CATEGORIA => $categoria, MUE_MATERIAL => $material]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/mueble.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "categoria" => ["value" => $categoria],
  "material" => ["value" => $material],
 ]);
});
