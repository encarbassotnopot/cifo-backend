@extends('layout')
@section('contenido')
    <section id="contenido">
        <div class='row animated fadeIn slow'>
            <div class='column col-8'>
                <form action="" method='post' enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Título</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="titulo" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="direccion" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Año</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="anio" value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Portada</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="portada" id='portada' value="" accept='image/*'>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Sinopsis</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="sinopsis" rows="5"></textarea>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Alta película</button>
                </form>
            </div>
            <div class='column col-4'>
                <img src='{{asset("img/abyss.jpg")}}' alt="previsualizar" id='previsualizar'>
            </div>
        </div>
    </section>
@endsection