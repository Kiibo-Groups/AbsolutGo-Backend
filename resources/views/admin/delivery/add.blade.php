@extends('admin.layout.main')

@section('title') Agregar Repartidor @endsection

@section('icon') mdi-calendar @endsection

@section('content')

<div class="col-lg-12">
    <div class="row">
        <div class="card py-3 m-b-30">
            <div class="card-body">
                {!! Form::model($data, ['url' => [$form_url],'files' => true]) !!}
                @include('admin.delivery.form')

                @include('admin.delivery.comi_staff')

                <button type="submit" class="btn btn-success btn-cta">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
       
    </div>
        
</div>
 
@endsection