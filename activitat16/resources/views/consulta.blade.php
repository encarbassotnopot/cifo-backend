@extends('layout')
@section('contingut')
    <h2>Consulta de pacientes</h2>
    <br>
    <form action="" method="get">
        <div class="mb-3">
            <label class="form-label">Pacientes a mostrar:</label>
            <select class="form-select" name="mostrar" onchange="this.form.submit()">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Buscar por apellido:</label>
            <input type="search" class="form-control" id="filtro" name="filtro" onkeyup="this.form.submit()">
        </div>
    </form>
    <br>

    <table id='pacientes' class="table table-striped">
        <tr>
            <th>NIF</th>
            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th></th>
        </tr>
        <tr>
            <td>nif</td>
            <td>nombre</td>
            <td>apellidos</td>
            <td>
                <form action="" method='GET'>
                    <input type='submit' value='Detalle paciente'>
                </form>
            </td>
        </tr>
    </table>
@endsection