<?php
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_MUEBLE.php";

ejecutaServicio(function () {
    $lista = select(pdo: Bd::pdo(), from: MUEBLE, orderBy: MUE_NOMBRE);

    // Inicia la lista de descripción con clases de Bootstrap
    $render = "<dl class='row'>";

    foreach ($lista as $modelo) {
        $encodeId = urlencode($modelo[MUE_ID]);
        $id = htmlentities($encodeId);
        $nombre = htmlentities($modelo[MUE_NOMBRE]);
        $categoria = htmlentities($modelo[MUE_CATEGORIA]);
        $material = htmlentities($modelo[MUE_MATERIAL]);

        $render .= "
            <div class='col-12 mb-4 p-3 border rounded shadow-sm' style='border-color: #ff69b4;'>
                <dt style='font-size: 1.25rem; font-weight: 600; color: #ff69b4;'>
                    <a href='modifica.html?id=$id' style='text-decoration: none; color: #ff69b4;'>$nombre</a>
                </dt>
                <dd style='color: #ff69b4; margin-bottom: 0.5rem;'>
                    <a href='modifica.html?id=$id' style='text-decoration: none; color: #ff69b4;'>$categoria, $material</a>
                </dd>
                <button class='btn w-100' style='background-color: #ffe4e1; border: 2px solid #ff69b4; color: #ff69b4;' disabled>
                </button>
            </div>";
    }

    $render .= "</dl>";

    devuelveJson(["tabla" => ["innerHTML" => $render]]);
});
