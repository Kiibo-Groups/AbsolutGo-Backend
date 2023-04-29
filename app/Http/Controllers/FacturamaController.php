<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Twilio\Rest\Client;
use App\Admin;
use App\User;
use App\AppUser;


use Facturama;
class FacturamaController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $public_key;
    private $private_key;
    private $endpoint = "https://apisandbox.facturama.mx/";
    private $facturama;


    

    public function __construct()
    {
        $this->facturama = new Facturama\Client('KiiboGroups', 'KiiboGroups1106');
        
    }
    
    /**
     * Agregamos/Editar Un Cliente
     * $type = "new" or "edit"
     */
    function addClient($data, $type)
	{
        try {
            $params = array(
                'Id'                => ($type == 'new') ? '' : $data['clientId'],
                'Rfc'             => strtoupper($data['Rfc']),
                'Name'            => strtoupper($data['Name']),
                'Email'           => $data['Email'],
                'FiscalRegime'    => $data['FiscalRegime'],
                'CfdiUse'         => $data['CfdiUse'],
                'TaxZipCode'      => ucwords($data['ZipCode']),
                'TaxResidence'    => ucwords($data['ZipCode']),
                'NumRegIdTrib'    => ucwords($data['ZipCode']),
                'Address' => array(
                    'Street'          => (isset($data['Street'])) ? $data['Street'] : 'General',
                    'ExteriorNumber'  => (isset($data['ExteriorNumber'])) ? $data['ExteriorNumber'] : '123',
                    'InteriorNumber'  => (isset($data['InteriorNumber'])) ? $data['InteriorNumber'] : '123',
                    'Neighborhood'    => (isset($data['Neighborhood'])) ? $data['Neighborhood'] : 'monterrey',
                    'ZipCode'         => (isset($data['ZipCode'])) ? $data['ZipCode'] : '64000',
                    'Locality'        => (isset($data['Locality'])) ? $data['Locality'] : 'nuevo leon',
                    'Municipality'    => (isset($data['Municipality'])) ? $data['Municipality'] : 'nuevo leon',
                    'State'           => (isset($data['State'])) ? $data['State'] : 'Monterrey',
                    'Country'         => 'MX',
                ),
            );

            // Realizamos la consulta
            if ($type == 'new') {
                return $params;  //$this->facturama->post('Client', $params);
            }else {
                return $this->facturama->put('Client/'.$data['clientId'], $params);
            }
        } catch (\Exception $th) {
            return $th->getMessage();
        }
	}

    /**
     * Obtenemos Listado de Clientes
     */
    function getClients()
	{
		try {
            $params = [];
            return $this->facturama->get('Client', $params);
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }
    
    /**
     * Filtrado de clientes por RFC
     */
    function searchClientByRfc($data)
    {
        try {
            $params = ['keyword' => $data['rfc']];
            return $this->facturama->get('Client', $params);
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

     /**
     * Filtrado de clientes por ID
     */
    function searchClientById($id)
    {
        try {
            $params = ['id' => $id];
            return $this->facturama->get('Client', $params); 
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

    /**
     * Eliminamos un Cliente Por Id
     */
    function DeleteClient($id)
    {
        try {
            $clientId = $id;
            return $this->facturama->delete('Client/'.$clientId);
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

    /**
     * Agregado de productos
     */
    function AddProduct($data)
    {
        try {
            $params = [
                    "Unit"      => $data['Unit'],
                    "UnitCode"  => $data['UnitCode'],
                    "IdentificationNumber" => $data['IdentificationNumber'],
                    "Name"      => $data['Name'],
                    "Description" => $data['Description'],
                    "Price"     => $data['Price'],
                    "CodeProdServ"  => $data['CodeProdServ'],
                    "CuentaPredial" => $data['CuentaPredial'],
                    "Taxes" => [
                        [
                            "Name" =>  $data['Name'], // IVA,
                            "Rate" =>  $data['Rate'], // 0.16,
                            "IsRetention" =>  $data['IsRetention'], // false,
                            "IsFederalTax" =>  $data['IsFederalTax'], // false
                        ]
                    ]
            ];

            return $this->facturama->post('product', $params);
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }
 
    /**
     * Descargar Factura 
     */    
    function DownloadBill($data)
    {
        try {
            $format = 'pdf';  //Formato del archivo a obtener(pdf,Xml,html)
            $type = 'issued'; // Tipo de comprobante a obtener (payroll | received | issued)
            $id = $data['idBill']; // Identificador unico de la factura
            $params = [];
            $result = $this->facturama->get('cfdi/'.$format.'/'.$type.'/'.$id, $params);
            $myfile = fopen('factura'.$id.'.'.$format, 'a+');
            fwrite($myfile, base64_decode(end($result)));
            fclose($myfile);
            return true;
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

    /**
     * Enviar CFDI por email
     */
    function SendCFDIByEmail($data)
    {
        try {
            $body = [];
            $params = [
                'cfdiType' => 'issued',
                'cfdiId' => $data['cfdiId'],
                'email' => $data['email'],
            ];

            return $this->facturama->post('Cfdi', $body, $params);
        } catch (\Exception $th) {
            return $th->getMessage();
        }
    }

}