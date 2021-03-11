@extends("layouts.plantilla")

@section("cabecera")


@endsection


@section("infoGeneral")
<h1>Información general</h1>
<p>Aquí va el contenido principal de la página</p>

@if(count($alumnos))
<table width="50%" border="1" align="center" style="text-align: center;">

    @foreach($alumnos as $persona)
    <tr>
        <td>{{$persona}}</td>        
    </tr>
    @endforeach


</table>
@else
{{"Sin alumnos"}}

@endif


@endsection



@section("pie")

@endsection