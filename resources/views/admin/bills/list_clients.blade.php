@extends('admin.layout.main')

@section('title') Gestión de Clientes @endsection
@section('breadcrumb') Clientes @endsection


@section('content')

<div class="col-lg-12">
    <div class="row">
         
    <div class="card py-3 m-b-30">

        <div class="row">
            <div class="col-md-12" style="text-align: right;"><a href="{{ Asset(env('admin').'/add_client') }}" class="btn m-b-15 ml-2 mr-2 btn-rounded btn-success">Agregar Cliente</a>&nbsp;&nbsp;&nbsp;</div>
        </div>

        <div class="card-body py-3 m-b-30" style="padding-top: 25px">
            <table class="table table-hover ">
                <thead>
                    <tr>
                        <th>Nombre / Razón Social</th>
                        <th>RFC</th>
                        <th>Uso de la factura</th>
                        <th>Régimen fiscal</th>
                        <th>E-Mail</th> 
                        <th style="text-align: right">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->Name }}</td>
                            <td>{{ $row->Rfc }}</td>
                            <td>
                                @switch($row->CfdiUse)
                                    @case('CN01')
                                        CN01 - Nómina
                                        @break
                                    @case('CP01')
                                        CP01 - Pagos
                                        @break
                                    @case('D01')
                                        D01 - Honorarios médicos, dentales y gastos hospitalarios.
                                        @break
                                    @case('D02')
                                        D02 - Gastos médicos por incapacidad o discapacidad
                                        @break
                                    @case('D03')
                                        D03 - Gastos funerales
                                        @break
                                    @case('D04')
                                        D04 - Donativos.
                                        @break
                                    @case('D05')
                                        D05 - Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).
                                        @break
                                    @case('D06')
                                        D06 - Aportaciones voluntarias al SAR.
                                        @break
                                    @case('D07')
                                        D07 - Primas por seguros de gastos médicos.
                                        @break
                                    @case('D08')
                                        D08 - Gastos de transportación escolar obligatoria.
                                        @break
                                    @case('D09')
                                        D09 - Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.
                                        @break
                                    @case('D10')
                                        D10 - Pagos por servicios educativos (colegiaturas)
                                        @break
                                    @case('G01')
                                        G01 - Adquisición de mercancias
                                        @break
                                    @case('G02')
                                        G02 - Devoluciones, descuentos o bonificaciones
                                        @break
                                    @case('G03')
                                        G03 - Gastos en general
                                        @break
                                    @case('I01')
                                        I01 - Construcciones
                                        @break
                                        @case('D10')
                                        D10 - Pagos por servicios educativos (colegiaturas)
                                        @break
                                    @case('I02')
                                        I02 - Mobilario y equipo de oficina por inversiones
                                        @break
                                    @case('I03')
                                        I03 - Equipo de transporte
                                        @break
                                    @case('I04')
                                        I04 - Equipo de computo y accesorios
                                        @break
                                    @case('I05')
                                        I05 - Dados, troqueles, moldes, matrices y herramental
                                        @break
                                    @case('I06')
                                        I06 - Comunicaciones telefónicas
                                        @break
                                    @case('I07')
                                        I07 - Comunicaciones satelitales
                                        @break
                                    @case('I08')
                                        I08 - Otra maquinaria y equipo
                                        @break
                                    @case('S01')
                                        S01 - Sin efectos fiscales
                                        @break
                                    @default
                                        No Encontrado
                                        @break;
                                @endswitch
                            </td>
                            <td>
                               {{ $row->FiscalRegime }}
                            </td>
                            <td>
                                {{ $row->Email }}
                            </td>
                            <td style="text-align: right">
                                
                                <button class="btn btn-primary dropdown-toggle" 
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Opciones
                                </button>
                                
                                <ul class="dropdown-menu" style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 38px);" data-popper-placement="bottom-start">
                                     
                                    <!-- LoginUser -->
                                    <li>
                                        <a href="{{ Asset(env('admin').'/generate_bill') }}" class="dropdown-item" target="_blank">
                                            Generar Factura
                                        </a>
                                    </li>
                                     
                                    @if($row->Rfc!= 'XAXX010101000')
                                    <li>
                                        <a href="{{ Asset($link.$row->Id.'/edit') }}" class="dropdown-item">
                                            Editar
                                        </a>
                                    </li>
                                    <!-- Delete -->
                                    <li>
                                        <a href="javascript::void()" class="dropdown-item" onclick="deleteConfirm('{{ Asset($link.'delete/'.$row->Id) }}')">
                                            Eliminar
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>

@endsection