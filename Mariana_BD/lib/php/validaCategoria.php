<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaCategoria(false|string $categoria)
{
    if ($categoria === false) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Falta el categoria.",
            type: "/error/faltaCategoria.html",
            detail: "La solicitud no tiene el valor de categoria."
        );
    }

    $trimCategoria = trim($categoria);

    if ($trimCategoria === "") {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "categoria en blanco.",
            type: "/error/categoriaenblanco.html",
            detail: "Pon texto en el campo categoria."
        );
    }

    // Validación de longitud mínima
    if (strlen($trimCategoria) <= 2) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Categoria demasiado corto.",
            type: "/error/categoriacorto.html",
            detail: "El categoria debe tener minimo 3 caracteres."
        );
    }

    return $trimCategoria;
}
