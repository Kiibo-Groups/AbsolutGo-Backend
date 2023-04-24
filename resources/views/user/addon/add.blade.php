@extends('user.layout.main')

@section('title') Agregar Nuevo @endsection
@section('breadcrumb') Agregar Elemento @endsection


@section('content')

<div class="col-lg-12">
    <div class="row">
        <div class="card py-3 m-b-30">
            <div class="card-body">
                {!! Form::model($data, ['url' => [$form_url],'files' => true],['class' => 'col s12']) !!}
                    @include('user.addon.form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection