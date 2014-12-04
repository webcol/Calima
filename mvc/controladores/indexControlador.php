<?php

class indexControlador extends Cf_Controlador
{
    private $_exc;
    private $_ayuda;
    private $_seg;
    private $_sesion;
    
    public function __construct() {
        parent::__construct();
        //Aqui cargamos libreria externa 
        $this->cargaLib('PHPExcel');
        $this->_exc = new PHPExcel;
        
        // cargamos la clase ayudantes para usar sus metodos de ayuda
        $this->cargaAyudante('Cf_PHPAyuda');
        $this->_ayuda= new Cf_PHPAyuda;
        $this->cargaAyudante('Cf_PHPAyuda');
		$this->cargaAyudante('Cf_PHPSeguridad');
        $this->_seg= new Cf_PHPSeguridad;
        $this->_sesion=new Cf_Sesion();
        
    }
    
    public function index()
    { 
        $this->_vista->titulo = 'CalimaFramework';
        $this->_vista->imprimirVista('index', 'inicio');
        $this->_sesion->iniciarSesion('_s', false);
    }
    
    public function datox(){
        echo "daoxxxxx";
    }
    
    public function pruebas()
    {
        $datas = $this->cargaMod('prueba');
        $datas->
        $this->_vista->postear= $datas->llamarDatos();
        
        $this->_vista->titulo = 'CalimaFramework';
        $this->_vista->imprimirVista('index', 'inicio');
    }
    
    public function filtro($texto){
        
       echo $this->_seg->filtrarTexto($texto);
    }
    
    public function filtroEspeciales($texto){
    echo $this->_seg->filtrarCaracteresEspeciales($texto);
    }
    
    public function ecx1(){
        
        error_reporting(0);
        // Establecer propiedades
$this->_exc->getProperties()
->setCreator("Cattivo")
->setLastModifiedBy("Cattivo")
->setTitle("Documento Excel de Prueba")
->setSubject("Documento Excel de Prueba")
->setDescription("Demostracion sobre como crear archivos de Excel desde PHP.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Pruebas de Excel");

// Agregar Informacion
$this->_exc->setActiveSheetIndex(0)
->setCellValue('A1', 'Valor 1')
->setCellValue('B1', 'Valor 2')
->setCellValue('C1', 'Total')
->setCellValue('A2', '10')
->setCellValue('C2', '=sum(A2:B2)');

// Renombrar Hoja
$this->_exc->getActiveSheet()->setTitle('Tecnologia Simple');

// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$this->_exc->setActiveSheetIndex(0);

// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="pruebaReal.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($_exc, 'Excel2007');
$objWriter->save('php://output');
exit;

        
    }
    
    
}
