<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaMaterial.php";
require_once __DIR__ . "/../lib/php/validaCategoria.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_MUEBLE.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $categoria = recuperaTexto("categoria");
 $material = recuperaTexto("material");
 $nombre = validaNombre($nombre);
 $categoria = validaCategoria($categoria);
 $material = validaMaterial($material);

 

 update(
  pdo: Bd::pdo(),
  table: MUEBLE,
  set: [MUE_NOMBRE => $nombre, MUE_CATEGORIA => $categoria, MUE_MATERIAL => $material],
  where: [MUE_ID => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "categoria" => ["value" => $categoria],
  "material" => ["value" => $material],
 ]);
});
