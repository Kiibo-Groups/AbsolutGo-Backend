@extends('admin.layout.main')

@section('title') Agregar Cliente @endsection
@section('breadcrumb') Nuevo elemento @endsection

@section('content') 
<div class="col-lg-11 mx-auto">
    <div class="row">
        {!! Form::model($data, ['url' => [$form_url],'files' => true],['class' => 'col s12']) !!}
            @include('admin.bills.formClient')
        </form>
    </div>
</div>
@endsection