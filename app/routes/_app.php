<?php

app()->get("/", function () {
    response()->json(["message" => "Hola "]);
});

app()->get("/app", function () {
    // app() returns $app
    response()->json(app()->routes());
});

//consulta todos los registros Verbo GET
app()->get("/contactos", 'ContactosController@index');

//consulta un registro con un ID Verbo GET
app()->get("/contactos/{id}", 'ContactosController@consultar');

//inserta un registro Verbo POST
app()->post("/contactos", 'ContactosController@agregar');

//Elimina un registro Verbo DELETE
app()->delete("/contactos/{id}", 'ContactosController@eliminar');

//Actualiza un registro con el ID. verbo PUT

app()->put("/contactos/{id}", 'ContactosController@actualizar');
