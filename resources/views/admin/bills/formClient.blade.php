@if($data)
<input type="hidden" name="clientId" value="{{ $data->Id }}">
@endif
<div class="card py-3 m-b-30">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="Name">Nombre / Razón Social:</label>
                <input type="text" name="Name" id="Name" class="form-control" required="" value="@if($data) {{ $data->Name }} @endif">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="Email">E-Mail:</label>
                <input type="text" name="Email" id="Email" class="form-control" required="" value="@if($data) {{ $data->Email }} @endif">
            </div>

            <div class="col-md-3">
                <label for="Rfc">RFC:</label>
                <input type="text" name="Rfc" id="Rfc" class="form-control" required="" value="@if($data) {{ $data->Rfc }} @endif">
            </div>

            <div class="col-md-3">
                <label for="ZipCode">C.P:</label>
                <input type="text" name="ZipCode" id="ZipCode" class="form-control" required="" value="@if($data) {{ $data->Address->ZipCode }} @endif">
            </div>
        </div> 

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="CfdiUse">Uso de la factura:</label>
                <select class="form-control" name="CfdiUse" required="">
                    <option value="">Seleccionar Uso de la factura</option>
                    <option value="CN01" @if($data) @if($data->CfdiUse == 'CN01') selected @endif @endif>CN01 - Nómina</option>
                    <option value="CP01" @if($data) @if($data->CfdiUse == 'CP01') selected @endif @endif>CP01 - Pagos</option>
                    <option value="D01" @if($data) @if($data->CfdiUse == 'D01') selected @endif @endif>D01 - Honorarios médicos, dentales y gastos hospitalarios.</option>
                    <option value="D02" @if($data) @if($data->CfdiUse == 'D02') selected @endif @endif>D02 - Gastos médicos por incapacidad o discapacidad</option>
                    <option value="D03" @if($data) @if($data->CfdiUse == 'D03') selected @endif @endif>D03 - Gastos funerales.</option>
                    <option value="D04" @if($data) @if($data->CfdiUse == 'D04') selected @endif @endif>D04 - Donativos.</option>
                    <option value="D05" @if($data) @if($data->CfdiUse == 'D05') selected @endif @endif>D05 - Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación).</option>
                    <option value="D06" @if($data) @if($data->CfdiUse == 'D06') selected @endif @endif>D06 - Aportaciones voluntarias al SAR.</option>
                    <option value="D07" @if($data) @if($data->CfdiUse == 'D07') selected @endif @endif>D07 - Primas por seguros de gastos médicos.</option>
                    <option value="D08" @if($data) @if($data->CfdiUse == 'D08') selected @endif @endif>D08 - Gastos de transportación escolar obligatoria.</option>
                    <option value="D09" @if($data) @if($data->CfdiUse == 'D09') selected @endif @endif>D09 - Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.</option>
                    <option value="D10" @if($data) @if($data->CfdiUse == 'D10') selected @endif @endif>D10 - Pagos por servicios educativos (colegiaturas)</option>
                    <option value="G01" @if($data) @if($data->CfdiUse == 'G01') selected @endif @endif>G01 - Adquisición de mercancias</option>
                    <option value="G02" @if($data) @if($data->CfdiUse == 'G02') selected @endif @endif>G02 - Devoluciones, descuentos o bonificaciones</option>
                    <option value="G03" @if($data) @if($data->CfdiUse == 'G03') selected @endif @endif>G03 - Gastos en general</option>
                    <option value="I01" @if($data) @if($data->CfdiUse == 'I01') selected @endif @endif>I01 - Construcciones</option>
                    <option value="I02" @if($data) @if($data->CfdiUse == 'I02') selected @endif @endif>I02 - Mobilario y equipo de oficina por inversiones</option>
                    <option value="I03" @if($data) @if($data->CfdiUse == 'I03') selected @endif @endif>I03 - Equipo de transporte</option>
                    <option value="I04" @if($data) @if($data->CfdiUse == 'I04') selected @endif @endif>I04 - Equipo de computo y accesorios</option>
                    <option value="I05" @if($data) @if($data->CfdiUse == 'I05') selected @endif @endif>I05 - Dados, troqueles, moldes, matrices y herramental</option>
                    <option value="I06" @if($data) @if($data->CfdiUse == 'I06') selected @endif @endif>I06 - Comunicaciones telefónicas</option>
                    <option value="I07" @if($data) @if($data->CfdiUse == 'I07') selected @endif @endif>I07 - Comunicaciones satelitales</option>
                    <option value="I08" @if($data) @if($data->CfdiUse == 'I08') selected @endif @endif>I08 - Otra maquinaria y equipo</option>
                    <option value="S01" @if($data) @if($data->CfdiUse == 'S01') selected @endif @endif>S01 - Sin efectos fiscales</option>
                </select>
            </div>
            
            <div class="col-md-6">
                <label for="cmbFiscalRegimes">Régimen fiscal:</label>
                <select class="form-control" id="cmbFiscalRegimes" name="FiscalRegime" required="">
                    <option value="">Selecciona el Régimen fiscal</option>
                    <option value="605" @if($data) @if($data->FiscalRegime == '605') selected @endif @endif >605 - Sueldos y Salarios e Ingresos Asimilados a Salarios</option>
                    <option value="606" @if($data) @if($data->FiscalRegime == '606') selected @endif @endif >606 - Arrendamiento</option>
                    <option value="607" @if($data) @if($data->FiscalRegime == '607') selected @endif @endif >607 - Régimen de Enajenación o Adquisición de Bienes</option>
                    <option value="608" @if($data) @if($data->FiscalRegime == '608') selected @endif @endif >608 - Demás ingresos</option>
                    <option value="610" @if($data) @if($data->FiscalRegime == '610') selected @endif @endif >610 - Residentes en el Extranjero sin Establecimiento Permanente en México</option>
                    <option value="611" @if($data) @if($data->FiscalRegime == '611') selected @endif @endif >611 - Ingresos por Dividendos (socios y accionistas)</option>
                    <option value="612" @if($data) @if($data->FiscalRegime == '612') selected @endif @endif >612 - Personas Físicas con Actividades Empresariales y Profesionales</option>
                    <option value="614" @if($data) @if($data->FiscalRegime == '614') selected @endif @endif >614 - Ingresos por intereses</option>
                    <option value="615" @if($data) @if($data->FiscalRegime == '615') selected @endif @endif >615 - Régimen de los ingresos por obtención de premios</option>
                    <option value="616" @if($data) @if($data->FiscalRegime == '616') selected @endif @endif >616 - Sin obligaciones fiscales</option>
                    <option value="621" @if($data) @if($data->FiscalRegime == '621') selected @endif @endif >621 - Incorporación Fiscal</option>
                    <option value="625" @if($data) @if($data->FiscalRegime == '625') selected @endif @endif >625 - Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas</option>
                    <option value="626" @if($data) @if($data->FiscalRegime == '626') selected @endif @endif >626 - Régimen Simplificado de Confianza</option>
                </select>
            </div> 
        </div>
  
    </div>
</div>
 
<h1 style="font-size: 20px">Información personal <small>Datos Opcionales</small> </h1>
<div class="card py-3 m-b-30">
    <div class="card-body">
        <div class="row mb-3">  
            <div class="col-md-12">
                <label for="Street">Calle:</label>
                <input type="text" name="Street" id="Street" class="form-control" required="" value="@if($data) {{ $data->Address->Street }} @endif">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="ExteriorNumber">No. Exterior:</label>
                <input type="text" name="ExteriorNumber" id="ExteriorNumber" required="" class="form-control" value="@if($data) {{ $data->Address->ExteriorNumber }} @endif">
            </div>

            <div class="col-md-6">
                <label for="InteriorNumber">No. Interior:</label>
                <input type="text" name="InteriorNumber" id="InteriorNumber" required="" class="form-control" value="@if($data) {{ $data->Address->InteriorNumber }} @endif">
            </div>
        </div>

        <div class="row mb-3">  
            <div class="col-md-12">
                <label for="Neighborhood">Colonia:</label>
                <input type="text" name="Neighborhood" id="Neighborhood" required="" class="form-control" value="@if($data) {{ $data->Address->Neighborhood }} @endif">
            </div>
        </div>

        <div class="row mb-3">  
            <div class="col-md-12">
                <label for="Locality">Localidad:</label>
                <input type="text" name="Locality" id="Locality" required="" class="form-control" value="@if($data) {{ $data->Address->Locality }} @endif">
            </div>
        </div>

        <div class="row mb-3">  
            <div class="col-md-12">
                <label for="Municipality">Municipio:</label>
                <input type="text" name="Municipality" id="Municipality" required="" class="form-control" value="@if($data) {{ $data->Address->Municipality }} @endif">
            </div>
        </div>

        <div class="row mb-3">  
            <div class="col-md-12">
                <label for="State">Estado:</label>
                <input type="text" name="State" id="State" class="form-control" required="" value="@if($data) {{ $data->Address->State }} @endif">
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-success btn-cta">Guardar Cambios</button><br><br>
 