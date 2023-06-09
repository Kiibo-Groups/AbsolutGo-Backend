@include('admin.order.dispatch')
@include('admin.order.info_pay')
@include('admin.order.assignStaff')

@if($row->status == 0)
    <div style="text-align: right">
        <button class="btn btn-primary dropdown-toggle" 
                type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
        </button>
        
        <ul class="dropdown-menu"  style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 38px);" data-popper-placement="bottom-start">
            <li>
                <a href="{{ Asset(env('admin').'/orderStatus?id='.$row->id.'&status=1') }}" onclick="return confirm('Are you sure?')" class="dropdown-item">
                    Confirmar Pedido
                </a>
            </li>
            <li>
                <a href="{{ Asset(env('admin').'/order/print/'.$row->id) }}" class="dropdown-item">
                    Imprimir Recibo
                </a>
            </li>
            <li>
                <a href="data:image/png;base64,{{ $row->code_order }}" target="_blank" class="dropdown-item">
                    Imprimir QR
                </a>
            </li>
            <li>
                <a href="javascript::void()" data-bs-toggle="modal" data-bs-target="#slideRightModalInfoPay{{ $row->id }}" class="dropdown-item">
                    Desglose de información
                </a>
            </li>
            <li>
                <a href="{{ Asset(env('admin').'/orderStatus?id='.$row->id.'&status=2') }}" onclick="return confirm('Are you sure?')" class="dropdown-item">
                    Cancelar Pedido
                </a>
            </li>
            
        </ul>
    </div>
@elseif($row->status == 8)
    <div style="text-align: right">
        <button class="btn btn-primary dropdown-toggle" 
                type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
        </button>
        
        <ul class="dropdown-menu"  style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 38px);" data-popper-placement="bottom-start">
            <li>
                <a href="{{ Asset(env('admin').'/orderStatus?id='.$row->id.'&status=0') }}" onclick="return confirm('Are you sure?')" class="dropdown-item">
                    Aceptar Pedido
                </a>
            </li>
            <li>
                <a href="{{ Asset(env('admin').'/order/print/'.$row->id) }}" class="dropdown-item">
                    Imprimir Recibo
                </a>
            </li>
            <li>
                <a href="javascript::void()" data-bs-toggle="modal" data-bs-target="#slideRightModalInfoPay{{ $row->id }}" class="dropdown-item">
                    Desglose de información
                </a>
            </li>
            <li>
                <a href="{{ Asset(env('admin').'/orderStatus?id='.$row->id.'&status=2') }}" onclick="return confirm('Are you sure?')" class="dropdown-item">
                    Cancelar Pedido
                </a>
            </li>
            
        </ul>
    </div>
@elseif($row->status == 1)
    <div style="text-align: right">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
        </button>
        
        <ul class="dropdown-menu"  style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 38px);" data-popper-placement="bottom-start">
             
            <li>
                <a href="javascript::void()" data-bs-toggle="modal" data-bs-target="#assignModalStaff{{ $row->id }}" class="dropdown-item">
                    Asignar Repartidor
                </a>
            </li>
            <li>
                <a href="{{ Asset(env('admin').'/order/print/'.$row->id) }}" class="dropdown-item">
                    Imprimir Recibo
                </a>
            </li>
            <li>
                <a href="data:image/png;base64,{{ $row->code_order }}" target="_blank" class="dropdown-item">
                    Imprimir QR
                </a>
            </li>
            <li>
                <a href="javascript::void()" data-bs-toggle="modal" data-bs-target="#slideRightModalInfoPay{{ $row->id }}" class="dropdown-item">
                    Desglose de información
                </a>
            </li>
            <li>
                <a href="{{ Asset(env('admin').'/orderStatus?id='.$row->id.'&status=2') }}" onclick="return confirm('Are you sure?')" class="dropdown-item">
                    Cancelar Pedido
                </a>
            </li>
            
        </ul>
    </div>
@elseif($row->status == 1.5 || $row->status == 3 || $row->status == 4)
    <div style="text-align: right">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
        </button>
        
        <ul class="dropdown-menu"  style="margin: 0px; position: absolute; inset: 0px auto auto 0px; transform: translate(0px, 38px);" data-popper-placement="bottom-start">
            @if($row->type == 1) <!-- A domicilio -->
                <li>
                    <a href="javascript::void()" data-toggle="modal" data-target="#slideRightModalStaff{{ $row->id }}" class="dropdown-item">
                        Solicitar Repartidor
                    </a>
                </li>
                @if($row->status == 3 || $row->status == 4)
                <li>
                    <a href="javascript::void()" data-toggle="modal" data-target="#assignModalStaff{{ $row->id }}" class="dropdown-item">
                        Asignar Repartidor Unico
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ Asset(env('admin').'/orderTicket/'.$row->id) }}" target="_blank" class="dropdown-item">
                        Imprimir Recibo
                    </a>
                </li>
                <li>
                    <a href="data:image/png;base64,{{ $row->code_order }}" target="_blank" class="dropdown-item">
                        Imprimir QR
                    </a>
                </li>
                <li>
                    <a href="javascript::void()" data-bs-toggle="modal" data-bs-target="#slideRightModalInfoPay{{ $row->id }}" class="dropdown-item">
                        Desglose de información
                    </a>
                </li>
                <li>
                    <a href="{{ Asset(env('admin').'/orderStatus?id='.$row->id.'&status=2') }}" onclick="return confirm('Are you sure?')" class="dropdown-item">
                        Cancelar Pedido
                    </a>
                </li>
            @elseif($row->type == 2) <!-- Para Llevar -->
                <li>
                    @if($row->status == 3 || $row->status == 4)
                    <a href="{{ Asset(env('admin').'/orderStatus?id='.$row->id.'&status=5') }}" onclick="return confirm('Are you sure?')" class="dropdown-item">
                        Entregar Pedido
                    @else 
                    <a href="{{ Asset(env('admin').'/orderStatus?id='.$row->id.'&status=3') }}" onclick="return confirm('Are you sure?')" class="dropdown-item">
                        Listo para entregar
                    @endif
                    </a>
                </li>
                <li>
                    <a href="{{ Asset(env('admin').'/orderTicket/'.$row->id) }}" target="_blank" class="dropdown-item">
                        Imprimir Recibo
                    </a>
                </li>
                <li>
                    <a href="data:image/png;base64,{{ $row->code_order }}" target="_blank" class="dropdown-item">
                        Imprimir QR
                    </a>
                </li>
                <li>
                    <a href="javascript::void()" data-bs-toggle="modal" data-bs-target="#slideRightModalInfoPay{{ $row->id }}" class="dropdown-item">
                        Desglose de información
                    </a>
                </li>
                <li>
                    <a href="{{ Asset(env('admin').'/orderStatus?id='.$row->id.'&status=2') }}" onclick="return confirm('Are you sure?')" class="dropdown-item">
                        Cancelar Pedido
                    </a>
                </li>
            @endif
        </ul>
    </div>
@elseif($row->status == 2)
    <div style="text-align: right">
        <button href="javascript::void()" data-bs-toggle="modal" data-bs-target="#slideRightModalInfoPay{{ $row->id }}" class="btn btn-primary">
            Desglose de información
        </button>
    </div>
@elseif($row->status == 5 || $row->status == 6)
    <button href="javascript::void()" data-bs-toggle="modal" data-bs-target="#slideRightModalInfoPay{{ $row->id }}" class="btn btn-primary">
        Desglose de información
    </button>
    <br>
    <br>
    <a href="/upload/order/delivery/delivery_end_{{ $row->id }}.jpg" target="_blank" class="btn btn-primary">
        Ver imagen del pedido
    </a>
@endif