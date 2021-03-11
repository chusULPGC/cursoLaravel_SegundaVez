<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */


Route::get('/', 'App\Http\Controllers\MiController@index');
Route::get('/inicio', 'App\Http\Controllers\MiController@index');
Route::get('/crear', 'App\Http\Controllers\MiController@create');
Route::get('/articulos', 'App\Http\Controllers\MiController@store');
Route::get('/mostrar', 'App\Http\Controllers\MiController@show');
Route::get('/contacto', 'App\Http\Controllers\MiController@contactar');
Route::get('/galeria', 'App\Http\Controllers\MiController@galeria');




/* VAMOS A HACER CRUD EN LA BD MEDIANTE RAW */
/*
  Route::get('/insertar', function() {
  DB::insert("INSERT INTO articulos (Nombre_Articulo, Precio, pais_origen, seccion, Observaciones)
  VALUES (?,?,?,?,?)", ["JARRON", 15.2, "JAPON", "CERAMICA", "GANGA"]);
  });



  Route::get('/leer', function() {
  $resultados = DB::select("SELECT * FROM articulos WHERE id=?", [1]);
  foreach ($resultados as $articulo) {
  echo '<table border="1" style="text-align:center; margin:auto;">'
  . '<th>'
  . '<td>' . $articulo->Nombre_Articulo . '</td>'
  . '<td>' . $articulo->Precio . '</td>'
  . '<td>' . $articulo->pais_origen . '</td>'
  . '<td>' . $articulo->seccion . '</td>'
  . '<td>' . $articulo->Observaciones . '</td>'
  . '</th>';
  }
  });

  Route::get('/actualiza', function() {
  DB::update("UPDATE articulos SET pais_origen='Japón', Nombre_Articulo='Plato' WHERE id=?",[1]);
  });


  Route::get('/borrar', function() {
  DB::delete("DELETE FROM articulos WHERE id=?",[2]);
  echo "datos borrados";
  });


 */


/* AHORA VAMOS A USAR ELOQUENT */

Route::get('/leer', function() {

    $articulos = App\Models\Articulo::all();
    echo '<table border="1" style="text-align:center; margin:auto;">'
    . '<tr>'
    . '<th>Articulo</th>'
    . '<th>Precio</th>'
    . '<th>Pais Origen</th>'
    . '<th>Seccion</th>'
    . '<th>Observaciones</th>'
    . '</tr>';
    foreach ($articulos as $articulo) {
        echo'<tr>'
        . '<td>' . $articulo->Nombre_Articulo . '</td>'
        . '<td>' . $articulo->Precio . '</td>'
        . '<td>' . $articulo->pais_origen . '</td>'
        . '<td>' . $articulo->seccion . '</td>'
        . '<td>' . $articulo->Observaciones . '</td>'
        . '</tr>';
    }
    echo '</table>';
});



Route::get('/condiciones', function() {

    $articulos = App\Models\Articulo::where("seccion", "Cerámica")->orderBy("Nombre_Articulo")->get(); //LAS CONDICIONES    
        echo '<table border="1" style="text-align:center; margin:auto;">'
        . '<tr>'
        . '<th>Articulo</th>'
        . '<th>Precio</th>'
        . '<th>Pais Origen</th>'
        . '<th>Seccion</th>'
        . '<th>Observaciones</th>'
        . '</tr>';
        foreach ($articulos as $articulo) {
            echo'<tr>'
            . '<td>' . $articulo->Nombre_Articulo . '</td>'
            . '<td>' . $articulo->Precio . '</td>'
            . '<td>' . $articulo->pais_origen . '</td>'
            . '<td>' . $articulo->seccion . '</td>'
            . '<td>' . $articulo->Observaciones . '</td>'
            . '</tr>';
        }
        echo '</table>';
});



