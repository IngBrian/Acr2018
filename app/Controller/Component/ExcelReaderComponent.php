<?php  
 App::uses('Component', 'Controller');  
  class ExcelReaderComponent extends Component {  
   protected $PHPExcelReader;  
   protected $PHPExcelLoaded = false;  
   private $dataArray;  
   public function initialize(Controller $controller) {  
     parent::initialize($controller);  
    // App::import('Vendor', 'PHPExcel', array('file' => 'Classes/PHPExcel'));  
     App::import('Vendor', 'PHPExcel/Classes/PHPExcel');
     if (!class_exists('PHPExcel'))  
       throw new CakeException('Vendor class PHPExcel not found!');  
     $dataArray = array();  
   }  
   public function loadExcelFile($filename) {  
     $this->PHPExcelReader = PHPExcel_IOFactory::  
     createReaderForFile($filename);  
     $this->PHPExcelLoaded = true;  
     $this->PHPExcelReader->setReadDataOnly(true);  
     $excel = $this->PHPExcelReader->load($filename);  
     $this->dataArray = $excel->getSheet(0)->toArray();  
     return $this->dataArray;
   }  
 }  
 ?>
