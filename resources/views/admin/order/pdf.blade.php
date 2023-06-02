<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Resultado de la orden AbsoluteGO</title>
        <style>
            /*
                width: 790px;
            */
            * {
                font-family: Arial, Helvetica, sans-serif;
                font-size: 12px;
                padding: 0;
                margin: 0;
            }

            body {
                background-color: #FFF;
            }

            .main {
                padding: 100px 100px 100px 80px;
            }

            .header {
                width: 100%;
            }

            .logo {
                float: left;
                width: 170px;
                height: 75px;
            }

            .title {
                float: right;
                display: block;
                width: 440px;
                text-align: center;
                height: 75px;
                line-height: 50px;
            }
        
            .row {
                display: block;
                clear:both;
                width: 610px;
            }

            .table-title {
                font-size: 8px;
                background-color: #E5B13C;
            }

            .date-container {
                display: block;
                float: right;
                width: 150px;
                text-align: center;
            }

            .date-container .date-title {
                border: 2px solid #000;
            }

            .date-container .date-value {
                border: 2px solid #000;
                border-top: 0;
                font-weight: bold;
                font-size: 13px;
            }

            .facturar-container {
                border-left: 0 !important;
                border-right: 0 !important;
            }

            .info-line {
                position: relative;
                top: -5px;
            }

            .last-info-line {
                top: -12px;
            }

            .info-line .info-container {
                float: left;
                border: 2px solid #000;
            }

            .info-line .table-title {
                text-align: center;
                border-bottom: 2px solid #000;
            }

            .info-line .info-value {
                min-height: 65px;
                padding: 5px 10px;
                font-size: 14px;
            }


            .proveedor-container,
            .facturar-container {
                width: 210px;
            }

            .pedido-container {
                width: 182px;
                text-align: center;
            }

            .pedido-value {
                line-height: 45px;
            }

            .last-info-line {
                text-align: center;
            }

            .last-info-line .info-container {
                border-right: 0;
            }

            .last-info-line .info-container .info-value {
                min-height: 20px;
            }

            .condiciones-container {
                width: 70px;
            }

            .moneda-container {
                width: 138px;
            }

            .entrega-container {
                width: 150px;
            }

            .contacto-container {
                width: 242px;
                border-right: 2px solid #000 !important;
            }

            .data-container {
                margin-top: 70px;
            }

            .data-table {
                width: 100%;
                border-collapse: collapse;
                border-bottom: 1px solid #000;
            }

            .data-table th {
                background-color: #E5B13C;
                border: 2px solid #000;
                border-collapse: collapse;
                font-size: 8px;
            }

            .data-table td {
                padding: 4px 2px;
                font-size: 8px;
                border-left: 1px solid #000;
                border-right: 1px solid #000;
            }

            .data-table .descripcion-td {
                border-right: 0 !important; 
            }

            .data-table .precio-td {
                border-left: 0 !important; 
            }

            .data-table .importe {
                width: 120px;
            }

            .result {
                float: right;
                width: 235px;
                border-spacing: 0;
            }

            .result-line {
                clear: both;
                width: 235px;
                padding: 0;
                margin: 0;
                height: 10px;
            }

            .result .result-text {
                display: inline-block;
                font-size: 8px;
                text-align: center;
                width: 115px;
                height: 10px;
                line-height: 12px;
            }

            .result .result-value {
                font-size: 8px;
                border-spacing: 0px;
                float: right;
                width: 117px;
                display: inline-block;
                border: 2px solid #000;
                padding-left: 3px;
                border-top: 1px solid #000;
                height: 10px;
                border-spacing: 0;
                background-color: #E5B13C;
            }

        </style>
    </head>
    <body>
        <div class="main">
            <div class="header">
                <img src="http://localhost/upload/admin/logo.jpg" class="logo">
                <h6 class="title">ORDEN DE COMPRA</h6>
            </div>
            <div class="content">
                <div class="row">    
                    <div class="date-container">
                        <div class="date-title table-title">
                            FECHA
                        </div> 
                        <div class="date-value">
                            {{ $fecha }}
                        </div>
                    </div>
                </div>
                <div class="row info-line">
                    <div class="proveedor-container info-container">
                        <div class="proveedor-title table-title">
                            PROVEEDOR
                        </div>
                        <div class="proveedor-value info-value">
                            {{ $proveedor }}
                        </div>
                    </div>
                    <div class="facturar-container info-container">
                        <div class="facturar-title table-title">
                            FACTURAR A
                        </div>
                        <div class="facturar-value info-value">
                            {{ $facturar_a }}
                        </div>
                    </div>
                    <div class="pedido-container info-container">
                        <div class="pedido-title table-title">
                            PEDIDO
                        </div>
                        <div class="pedido-value info-value">
                            {{ $id_pedido }}
                        </div>
                    </div>
                </div>
                <div class="row info-line last-info-line">
                    <div class="condiciones-container info-container">
                        <div class="condiciones-title table-title">
                            CONDICIONES
                        </div>
                        <div class="condiciones-value info-value">
                            -
                        </div>
                    </div>
                    <div class="moneda-container info-container">
                        <div class="moneda-title table-title">
                            MONEDA
                        </div>
                        <div class="moneda-value info-value">
                            MXN
                        </div>
                    </div>
                    <div class="entrega-container info-container">
                        <div class="entrega-title table-title">
                            FECHA DE ENTREGA
                        </div>
                        <div class="entrega-value info-value">
                            {{ $fecha_entrega }}
                        </div>
                    </div>
                    <div class="contacto-container info-container">
                        <div class="contacto-title table-title">
                            CONTACTO
                        </div>
                        <div class="contacto-value info-value">
                            administracion@absolutgo.com
                        </div>
                    </div>
                </div>
                <div class="row data-container">
                    <table class="data-table">
                        <tr>
                            <th class="cantidad">
                                CANTIDAD
                            </th>
                            <th class="tp">
                                TP
                            </th>
                            <th class="descripcion">
                                DESCRIPCIÓN
                            </th>
                            <th class="precio">
                                PRECIO
                            </th>
                            <th class="importe">
                                IMPORTE
                            </th>
                        </tr>
                        @foreach ($elementos as $elemento)
                            <tr>
                                <td>{{ $elemento['cantidad'] }}</td>
                                <td>{{ $elemento['tipo'] }}</td>
                                <td class="descripcion-td">{{ $elemento['descripcion'] }}</td>
                                <td class="precio-td">$ {{ $elemento['precio'] }}</td>
                                <td>$ {{ $elemento['precio'] }} </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="row result-container">
                    <div class="result">
                        <div class="result-line">
                            <div class="result-text">
                                SUBTOTAL
                            </div>
                            <div class="result-value">
                                $ {{ $subtotal }}
                            </div>
                        </div>
                        <div class="result-line">
                            <div class="result-text">
                                DESCUENTO
                            </div>
                            <div class="result-value">
                                $ {{ $descuento }}
                            </div>
                        </div>
                        <div class="result-line">
                            <div class="result-text">
                                IVA
                            </div>
                            <div class="result-value">
                                $ {{ $iva }}
                            </div>
                        </div>
                        <div class="result-line">
                            <div class="result-text total">
                                TOTAL
                            </div>
                            <div class="result-value">
                                $ {{ $total }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>