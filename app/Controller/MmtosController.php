<?php  //Realizado: 10&11&2014, por: mrjsanchez_gmail.com
App::uses('CakeEmail', 'Network/Email');
class MmtosController extends AppController {
   var $name = 'Mmtos';
   var $uses = array('Mmto','User','Afiliado');   
   public $components = array('ExcelReader'); 
   public function beforeFilter() {
        parent::beforeFilter();
        $this->loadData();
   }
   private function loadData(){
		$conditions = null;
		if(!$this->Session->read('Auth.User.Permiso.id_mod6')){ noAutorizadoModulo(); exit; }
		if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
			$conditions['Mmto.empresa']=$this->Session->read('Auth.User.empresa');
		}
		$mmtos = $this->paginate('Mmto', $conditions);
        $this->set('mmtos', $mmtos);
   }
	public function index(){
	}
	public function importar(){
		//Importar información
          if(!empty($this->data)) 
           {
        	   if( $this->data['Mmto']['archivo']['error'] == 0 &&  $this->data['Mmto']['archivo']['size'] > 0)
               {
				  $empresa=$this->Session->read('Auth.User.empresa');
				  $archivo=$this->data['Mmto']['archivo'];
				  //Informacion del tipo de archivo subido $this->data['Juzgado']['archivo']['type']
                  $destino = WWW_ROOT.'documentos'.DS.'Afiliados'.DS.$this->Session->read('Auth.User.empresa').DS;
				  $nlog="log_".date("Ymd")."_".rand(10,1000)."_".$empresa.".txt"; $log=$destino.$nlog;
				  ///////////////////////////////////////////////////////////////////////	
				  if (!is_dir($destino)) {
						mkdir($destino, 0777);
				  }
				  $arch=$destino.$archivo['name'];
				  ///////////////////////////////////////////////////////////////////////	
                  if(move_uploaded_file($archivo['tmp_name'], $destino.$archivo['name']))
                   {               
                     //$this->Session->setFlash(__('El archivo se a guardado'));
                   	 //Colectar datos del archivo
				   }else{
                      $this->Session->setFlash(__('El archivo no se pudo subir, por favor intentelo de nuevo'));       
                   }
                }else{
				      $this->Session->setFlash(__('Error al intentar subir el archivo'));
                }
				///////////////////////////////////////////////////////////////////////////7
				$file =  $destino.$archivo['name']; 
				//echo $file; 
				$this->set('filename', $file);  
				try {  
					$data=$this->ExcelReader->loadExcelFile($file);  
				} catch (Exception $e) {  
					echo 'Exception occured while loading the project list file';  
					exit;  
				}  
							
				//$cabezera=array("nit","nombre","contacto","direccion","telefonos","email","empresa"); 
				$fila=0;
				
				$w_gen="empresa=".$empresa;
				$errores_guardar="";  $cuantos_err=0; $exitosa=0;
				$ins=0; $dat_ins=array();
				foreach($data as $dato)
				{	
						//echo $dato[0];
						$id_tipo=0;
						$id_orden=0;
						$id_ordn1=0;
						$id_ordn2=0;
						$id_juzga=0;
						$id_asesor1=0;
						$id_asesor2=0;
						$id_dpto=0;
						$id_ciudad=0;
						$id_rel=0;
						if($fila>=3){
								
								//Tipo de proceso
							$tipo_proc=addslashes(strtoupper($dato[0]));
							$id_tipo=FindWhere("tbtprocesos","id","nombre",$tipo_proc,$w_gen,2);
							if(empty($id_tipo)&&$tipo_proc!=""){ 
								$sql1 ="insert into tbtprocesos(nombre,empresa) values('".$tipo_proc."',".$empresa.")";
								SaveMySQL($sql1);
								$id_tipo=DevolverId("tbtprocesos","id","empresa",$empresa,1);
							}
							//Relacionado
							$relacionado=addslashes(strtoupper($dato[17]));
							$id_rel=FindWhere("tbpagadurias","id","nombre",$relacionado,$w_gen,2);
							if(empty($id_rel)&&$relacionado!=""){ 
								$sql1 ="insert into tbpagadurias(nombre,empresa) values(";
								$sql1.="'".$relacionado."',".$empresa.")";
								SaveMySQL($sql1);
								$id_rel=DevolverId("tbpagadurias","id","empresa",$empresa,1);
							}
							//Ordenante
							$ordenante_cc=str_replace(".","",addslashes(strtoupper($dato[1])));
							$ordenante_cc=str_replace(",","",$ordenante_cc);
							$ordenante=addslashes(strtoupper($dato[2]));
							$id_orden=FindWhere("tbordenantes","id","nit",$ordenante_cc,$w_gen,2);
							if(empty($id_orden)&&$ordenante!=""){ 
								$sql1 ="insert into tbordenantes(ordenante_id,nit,nombre,prefijo,contacto,direccion,telefonos,email,empresa) values(";
								$sql1.=$fila.",'".$ordenante_cc."','".$ordenante."','','','','','',".$empresa.")";
								SaveMySQL($sql1);
								$id_orden=DevolverId("tbordenantes","id","empresa",$empresa,1);
							}
							//Ordenado 1
							$ordenado1_cc=str_replace(".","",addslashes(strtoupper($dato[5])));
							$ordenado1_cc=str_replace(",","",$ordenado1_cc);
							$ordenado1=addslashes(strtoupper($dato[6]));
							$id_ordn1=FindWhere("tbclientes","id","nit_cc",$ordenado1_cc,$w_gen,2);
							if(empty($id_ordn1)&&$ordenado1!=""){ 
								$sql1 ="insert into tbclientes(cliente_id,nit_cc,nombre_completo,direccion,telefonos,departamento_id,municipio_id,email,pweb,pais,fecha_registro,";
								$sql1.="hora_registro,empresa) values(";
								$sql1.=$fila.",'".$ordenado1_cc."','".$ordenado1."','','',0,0,'','','Colombia','".date("Y-m-d")."','".date("H:i:s")."',".$empresa.")";
								SaveMySQL($sql1);
								$id_ordn1=DevolverId("tbclientes","id","empresa",$empresa,1);
							}
							//Ordenado 2
							$ordenado2_cc=str_replace(".","",addslashes(strtoupper($dato[7])));
							$ordenado2_cc=str_replace(",","",$ordenado1_cc);
							$ordenado2=addslashes(strtoupper($dato[8]));
							$id_ordn2=FindWhere("tbclientes","id","nit_cc",$ordenado2_cc,$w_gen,2);
							if(empty($id_ordn2)&&$ordenado2!=""){ 
								$sql1 ="insert into tbclientes(cliente_id,nit_cc,nombre_completo,direccion,telefonos,departamento_id,municipio_id,email,pweb,pais,fecha_registro,";
								$sql1.="hora_registro,empresa) values(";
								$sql1.=$fila.",'".$ordenado2_cc."','".$ordenado2."','','',0,0,'','','Colombia','".date("Y-m-d")."','".date("H:i:s")."',".$empresa.")";
								SaveMySQL($sql1);
								$id_ordn2=DevolverId("tbclientes","id","empresa",$empresa,1);
							}
							//Juzgado
							$juzgado=addslashes(strtoupper($dato[10]));
							$id_juzga=FindWhere("tbjuzgados","id","nombre_juzgado",$juzgado,$w_gen,2);
							if(empty($id_juzga)&&$juzgado!=""){ 
								$sql1 ="insert into tbjuzgados(codigo,nombre_juzgado,oficina,empresa) values('','".$juzgado."','',".$empresa.")";
								SaveMySQL($sql1);
								$id_juzga=DevolverId("tbjuzgados","id","empresa",$empresa,1);
							}
							//Asesor 1

							$asesor1_cc=str_replace(".","",addslashes(strtoupper($dato[13])));
							$asesor1_cc=str_replace(",","",$asesor1_cc);
							$asesor1=addslashes(strtoupper($dato[14]));
							$id_asesor1=FindWhere("tbasesor","id","cedula",$asesor1_cc,$w_gen,2);
							if(empty($id_asesor1)&&$asesor1!=""){ 
								$sql1 ="insert into tbasesor(cedula,nombre,telefono,direcion,email,empresa) values(".$asesor1_cc.",'".$asesor1."','','','',".$empresa.")";
								//echo $sql1; exit;
									SaveMySQL($sql1);
									$id_asesor1=DevolverId("tbasesor","id","empresa",$empresa,1);
							}
							//Asesor 2
							
							$asesor2_cc=str_replace(".","",addslashes(strtoupper($dato[15])));
							$asesor2_cc=str_replace(",","",$asesor2_cc);
							$asesor2=addslashes(strtoupper($dato[16]));
							$id_asesor2=FindWhere("tbasesor","id","cedula",$asesor2_cc,$w_gen,2);
							if(empty($id_asesor2)&&$asesor2!=""){ 
								$sql1 ="insert into tbasesor(cedula,nombre,telefono,direcion,email,empresa) values(".$asesor2_cc.",'".$asesor2."','','','',".$empresa.")";
								//echo "<br>".$sql1; exit;
								SaveMySQL($sql1);
								$id_asesor2=DevolverId("tbasesor","id","empresa",$empresa,1);
							}
							//Departamento
							$departamento=addslashes(strtoupper($dato[11]));
							$id_dpto=DevolverId("tbdepartamentos","id","nombre_dpto",$departamento,2);
							//Ciudad
							$municipio=addslashes(strtoupper($dato[12]));
							$id_mun=DevolverId("tbmunicipios","id","nombre_municipio",$municipio,2);
							//Guardar
							

							if($dato[0]!="" && $dato[1]!=""){
								//Guardar Proceso
								$ref=addslashes(strtoupper($dato[3]));
								$fec=extrarfec_excel($dato[9]);
								//fechas
								//fin fechas
								
								
								$saldo_in=NumStr($dato[4]);
								if($fec!=""){ 
									$qty=abs((strtotime($fec)-strtotime(date('Y-m-d')))/86400);
								}else{
									$qty=0;
								}
								$id_tipo=NumStr($id_tipo);
								$id_orden=NumStr($id_orden);
								$id_ordn1=NumStr($id_ordn1);
								$id_ordn2=NumStr($id_ordn2);
								$id_juzga=NumStr($id_juzga);
								$id_asesor1=NumStr($id_asesor1);
								$id_asesor2=NumStr($id_asesor2);
								$id_dpto=NumStr($id_dpto);
								$id_ciudad=NumStr($id_ciudad);
								$id_rel=NumStr($id_rel);
								$qty=NumStr($qty);
								$saldo_in=NumStr($saldo_in);
								$id_mun=NumStr($id_mun);

								
								$sql ="insert into tb_procesos_a(id_tproceso,id_demandante,referencia,id_deudor,codeudor,fecha_inicio,QtyDMora,";
								$sql.="id_juzgado,pagare,saldo_int,doc_pagare";
								$sql.=",doc_saldo_int,doc_camara,doc_anexos,doc_r,estudio_credito,id_dpto,id_municipio,id_pagaduria,Abogado,Abogado2,";
								$sql.="estado,empresa) values(".$id_tipo;
								$sql.=",".$id_orden.",'',".$id_ordn1.",".$id_ordn2.",'".$fec."',".$qty.",".$id_juzga.",'".$ref."',".$saldo_in;
								$sql.=",'','','','','','',".$id_dpto.",".$id_mun.",".$id_rel.",".$id_asesor1.",".$id_asesor2.",1,".$empresa.")";
								//echo $sql;
								//exit;
								if(SaveMySQL($sql)==""){
									$id_proc=DevolverId("tb_procesos_a","id","empresa",$empresa,1);
									//inserciones
									$dat_ins[$ins]=",".$id_proc.",".$id_orden.",".$id_ordn1.",".$id_ordn2.",".$id_rel.",".$id_asesor1.",".$id_asesor2.",".$id_tipo.",".$id_juzga.")";
									$ins++;
									$exitosa++;
									
									//Guardar Agenda
									
									$sql="insert into tbagenda(id_proceso,fechaAgenda,hora,comentario,estado) values(";
									$sql.=$id_proc.",'".extrarfec_excel($dato[18])."','".addslashes(strtoupper($dato[19]))."','".addslashes(strtoupper($dato[20]))."',1)";
									SaveMySQL($sql);
									//Guardar Etapas
									if($dato[21]!=""){ //Etapa1
										$sql ="insert into etapa1(id_proceso,factura,valor,fecha,observaciones) values(";
										$sql.=$id_proc.",'".addslashes(strtoupper($dato[21]))."',".NumStr($dato[22]).",'".extrarfec_excel($dato[23])."',";
										$sql.="'".addslashes(strtoupper($dato[24]))."')";
										SaveMySQL($sql);
									}
									if($dato[25]!=""){ //Etapa2
										$sql ="insert into etapa2(id_proceso,fecha,propietario,arrendatario,observaciones) values(";
										$sql.=$id_proc.",'".extrarfec_excel($dato[25])."','".addslashes(strtoupper($dato[26]))."','".addslashes(strtoupper($dato[27]))."',";
										$sql.="'".addslashes(strtoupper($dato[28]))."')";
										SaveMySQL($sql);
									}
									if($dato[29]!=""){ //Etapa3
										$sql ="insert into etapa3(id_proceso,fecha,forma_pago,valor_pagar,fecha_pago,observaciones) values(";
										$sql.=$id_proc.",'".extrarfec_excel($dato[29])."','".addslashes(strtoupper($dato[30]))."',".NumStr($dato[31]).",'',";
										$sql.="'".addslashes(strtoupper($dato[32]))."')";
										SaveMySQL($sql);
									}
									if($dato[33]!=""){ //Etapa4
										$sql ="insert into etapa4(id_proceso,fecha,pprobatorio,ppendientes,cierre_per,alegatos,sentencia,fecha_juz,observaciones) values(";
										$sql.=$id_proc.",'".extrarfec_excel($dato[33])."','".addslashes(strtoupper($dato[34]))."','".addslashes(strtoupper($dato[35]))."',";
										$sql.="'".addslashes(strtoupper($dato[36]))."','".addslashes(strtoupper($dato[37]))."','".addslashes(strtoupper($dato[38]))."',";
										$sql.="'".extrarfec_excel($dato[39])."','".addslashes(strtoupper($dato[40]))."')";
										SaveMySQL($sql);
									}
									if($dato[41]!=""){ //Etapa5
										$sql ="insert into etapa5(id_proceso,fecha,no_contesta,no_telefonos,se_traslado,no_reside,dr_no_existe,observaciones) values(";
										$sql.=$id_proc.",'".extrarfec_excel($dato[41])."','".addslashes(strtoupper($dato[42]))."','".addslashes(strtoupper($dato[43]))."',";
										$sql.="'".addslashes(strtoupper($dato[44]))."','".addslashes(strtoupper($dato[45]))."','".addslashes(strtoupper($dato[46]))."',";
										$sql.="'".addslashes(strtoupper($dato[47]))."')";
										SaveMySQL($sql);
									}
									if($dato[48]!=""){ //Etapa5
										$sql ="insert into etapa6(id_proceso,fecha,observaciones) values(";
										$sql.=$id_proc.",'".extrarfec_excel($dato[48])."','".addslashes(strtoupper($dato[49]))."')";
										SaveMySQL($sql);
									}
									//Guardar Pagos
									if($dato[50]!=""){ //Etapa5
										$valor=NumStr($dato[51])+NumStr($dato[52])+NumStr($dato[53]);
										$sql ="insert into  tbpagos(idproceso,fecha_pago,pago_capital,pago_intereses,otros_pagos,valor,PathFile,observa,tipo,cancelado) values(";
										$sql.=$id_proc.",'".extrarfec_excel($dato[50])."',".NumStr($dato[51]).",".NumStr($dato[52]).",".NumStr($dato[53]).",".$valor;
										$sql.=",'','".addslashes(strtoupper($dato[54]))."','p','')";
										SaveMySQL($sql);
									}
									//Guardar Telefonos
									if($dato[55]!=""){ //telefonos
										//$sql ="insert into  tbclientes_telefonos(cliente_id,telefono,contacto,parentesco_id) values(";
										//$sql.=$id_proc.",'".addslashes(strtoupper($dato[45]))."',".NumStr($dato[46]).",".NumStr($dato[47]).",".NumStr($dato[48]).",".$valor;
										//$sql.=",'','".addslashes(strtoupper($dato[49]))."','p','')";
										//SaveMySQL($sql);
									}
								}//sino error
								else{
									$linea="";
									for($j=0;$j<=52;$j++){
										$linea.=$dato[$j]." | ";
									}
									if($linea!=""){
										$errores_guardar.=$linea."<br>";
									}
									$cuantos_err++;
								}
							
							
							}//sino null							
							//$fila++;	
							//fin guardar	
						}
						$fila++;
						//$this->Session->setFlash('Importacion exitosa!: ');
						//$dato[7]=$this->Session->read('Auth.User.empresa');
						//$info=array_combine($cabezera,$dato);
						//$ase=array("Ordenante" =>$info); 
						//$this->Ordenante->create();
				    	//$this->Ordenante->save($ase);
					
				}//fin foreach
			    //Crear logs de errores
				if($errores_guardar!=""){
					$file=fopen($log,"a") or die("Problemas");
					fputs($file,$errores_guardar);
					fclose($file);			   
					$sql="insert into tbmigracionesxls(nombreFile,empresa,fecha,hora,logerror) ";
					$sql.="values('".$archivo['name']."',".$empresa.",'".date("Y-m-d")."','".date("h:i:s")."','".$nlog."')";
					$this->Session->setFlash('Importacion exitosa, no olvide ver los logs('.$cuantos_err.') finales!: ');
				}else{
					$sql="insert into tbmigracionesxls(nombreFile,empresa,fecha,hora,logerror) ";
					$sql.="values('".$archivo['name']."',".$empresa.",'".date("Y-m-d")."','".date("h:i:s")."','')";
					$this->Session->setFlash('Importacion exitosa  !: ');
				}
				if(!empty($arch)){ if(file_exists($arch)){ @unlink($arch); } }
				SaveMySQL($sql);
				$id_mig=DevolverId("tbmigracionesxls","id","empresa",$empresa,1);
				//Guardar relacionados con archivos
				for($j=0;$j<$ins;$j++){
					$sql="insert into tbmigracionesprocesos values(".$id_mig.$dat_ins[$j];
					//echo $sql."<br>";
					SaveMySQL($sql);
				}
				//exit;
				$this->redirect('index');

				/////////////////////////////////////////////////////////////////////////////
				
		  }//General
		
		//Fin de importación
	}
	//Reversar
	public function reversar($id){
		   //Reversar procesos
		   ReversarMigracion($id,$this->Session->read('Auth.User.empresa'));
		   $this->Session->setFlash('Proceso de migracion reversado ');
		   $this->redirect('index');
		   	
	
	}
	
	public function logdata(){
		$this->redirect('index');
	}
	
/*
}else{
						$linea="";
						for($j=0;$j<=52;$j++){
							$linea.=$dato[$j]." | ";
						}
						if($linea!=""){
							$errores_guardar.=$linea."<br>";
						}
					}
*/

	//Adicionar registro
}

?>