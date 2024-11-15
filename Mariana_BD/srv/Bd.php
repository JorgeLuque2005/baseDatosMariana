<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

  // self::$pdo->exec("DROP TABLE IF EXISTS MUEBLE");
//  self::$pdo->exec("DROP TABLE IF EXISTS MUEBLE");
  

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS MUEBLE (
      MUE_ID INTEGER,
      MUE_NOMBRE TEXT NOT NULL,
      MUE_CATEGORIA TEXT NOT NULL,
      MUE_MATERIAL TEXT NOT NULL,

      CONSTRAINT MUE_PK
       PRIMARY KEY(MUE_ID),

      CONSTRAINT MUE_NOM_NV
       CHECK(LENGTH(MUE_NOMBRE) > 0),
       
      CONSTRAINT MUE_CAT_NV
       CHECK(LENGTH(MUE_CATEGORIA) > 0),
       
      CONSTRAINT MUE_MAT_NV
       CHECK(LENGTH(MUE_MATERIAL) > 0)
     )"
   );
  }

  return self::$pdo;
 }
}
