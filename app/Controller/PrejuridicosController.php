<?php
App::uses('CakeEmail', 'Network/Email');
App::uses('CakeTime', 'Utility');


class PrejuridicosController extends AppController {

    public $cacheAction = true;
    public $helpers=array('PhpExcel');

    var $uses = array('Prejuridico','LogPrejuridico',
        'Ordenante', 'Cliente','Asesor', 'Tproceso', 'Pagaduria','Juzgado',
        'Subestado',   'Pago','Afiliado', 'ClientesTelefono','Logalbum','Logarchivo','Logbag',
        'Logdocument','Logitem','Logpicture','PrejuridicoSubestado','LogPrejuridico','LogPrejuridicoSubestado','Logclientestelefono','Logpago',
        'Departamento','Municipio','Globaluser','Localidade','Acceso','Pendiente');
    var $ids=array(),$user_acces =array();

    public function isAuthorized($user) {
        // todos los visitantes ven el index

        if ($this->action === 'index') {
            return true;
        }


        if (in_array($this->action, array('add','export_excel','excelpagos','searchadv','view'))) {
            if ($user['role']=='registrado') {
                return true;
            }
        }



        if (in_array($this->action, array('add','export_excel','excelpagos','edit','bitacora','searchadv','view'))) {
            if ($user['role']=='director') {
                return true;
            }
        }

        if (in_array($this->action, array('add','export_excel','excelpagos','edit','bitacora','searchadv','view'))) {
            if ($user['role']=='administrator') {
                return true;
            }
        }


        return parent::isAuthorized($user);
    }



    public function beforeFilter() {
        $this->Auth->allow('indexseg','subestado');
        parent::beforeFilter();
        $this->loadData();
    }

    private function loadData(){

        //BRIAN MALDONADO 28/05/2016
        $empresa=$this->Auth->user('empresa');
        //mas adelante se deben traer solo los datos de la empresa a la que pertenece el usuario
        $options = array('pagare' => 'ESTRATO','guia' =>'LAVABOS','guia2' => 'PARQUEADERO','ntitulo' => 'ALCOBAS','nit'=>'CC VENDEDOR','nit_cc'=>'CC COMPRADOR');
        $this->set('options',$options);

        $ordenantes = $this->Ordenante->find('list',array('conditions'=>array('Ordenante.empresa'=>$empresa)));
        $this->set('ordenantes', $ordenantes);

        $asesores=$this->Asesor->find('list',array('conditions'=>array('Asesor.empresa'=>$empresa)));
        $this->set('asesores', $asesores);

        $cliente=$this->Cliente->find('list',array('conditions'=>array('Cliente.empresa'=>$empresa)));
        $this->set('clientes', $cliente);


        $tprocesos = $this->Tproceso->find('list',array('conditions'=>array('Tproceso.empresa'=>$empresa)));
        $this->set('tprocesos', $tprocesos);

        $ubicaciones=$this->Localidade->find('all',array('conditions'=>array('Localidade.empresa'=>$empresa)));


        $pagadurias = $this->Pagaduria->find('list',array('conditions'=>array('Pagaduria.empresa'=>$empresa)));
        $this->set('pagadurias', $pagadurias);

        $juzgados = $this->Juzgado->find('list',array('conditions'=>array('Juzgado.empresa'=>$empresa)));
        $this->set('juzgados', $juzgados);

        $subestados = $this->Subestado->find('list',array('conditions'=>array('Subestado.empresa'=>$empresa)));
        $this->set('subestados', $subestados);

        $options_desv=array('1-30'=>'1-30 dias','31-60'=>'31-60 dias', '61-90'=>'61-90 dias', '91-120'=>'91-120 dias', '121-150'=>'121-150 dias', '151-180'=>'151-180 dias', '180-250'=>'180-250 dias', '251-365'=>'251-365 dias', '366-500'=>'366-500 dias', '501-650'=>'501-650 dias', '651-770'=>'651-770 dias', '771-1000'=>'771 + 1000', '1000'=>'1000 + dias');
        $this->set('options_desv',$options_desv);

        $ubis= array();
        foreach($ubicaciones as $ubc) :$ubis[$ubc['Localidade']['id']]=$ubc['Localidade']['nombre']; endforeach;
        $this->set('ubicaciones',$ubis);
        $pendientes = $this->Pendiente->find('all',array('conditions'=>array('Pendiente.empresa'=>$empresa)));

        $pend= array();
        foreach($pendientes as $pen) :
            $pend[$pen['Pendiente']['id']]=$pen['Pendiente']['nombre'];
        endforeach;
        $this->set('pendientes', $pend);

        $this->user_acces = $this->Acceso->find('all',
            array('conditions'=>array('Acceso.usuario_id'=>$this->Auth->user('id'))));

        if(!empty($this->user_acces))
        {
            $this->ids=array();
            foreach($this->user_acces as $user_acce):
                $this->ids[]=$user_acce['Acceso']['proceso_id'];
            endforeach;

        }

    }
    //Al cargar la vista_ consulta1
    public function indexseg(){
        $this->redirect('/Prejuridicos');
    }

    public function index(){

        if(!empty( $this->user_acces))
        {
            $total_p = $this->Prejuridico->find('count',array('conditions' => array('Prejuridico.empresa'=>$this->Auth->user('empresa'),'Prejuridico.id' =>  $this->ids)));
            $this->paginate = array(
                'order' => array('Prejuridico.id' =>  'desc'),
                'conditions'=> array('Prejuridico.empresa'=> $this->Auth->user('empresa'),'Prejuridico.id' =>  $this->ids),
                'limit' => 10
            );
        }else{
            $total_p = $this->Prejuridico->find('count',array('conditions' => array('Prejuridico.empresa'=>$this->Auth->user('empresa'))));
            $this->paginate = array(
                'order' => array('Prejuridico.id' =>  'desc'),
                'conditions'=> array('Prejuridico.empresa'=> $this->Auth->user('empresa')),
                'limit' => 10
            );
        }

        $procesos = $this->paginate();

        $this->set('total_p',$total_p);
        $this->set('procesos',$procesos);
    }
    //Exportación a Excel pagos
    public function excelpagos(){
        $pagos=$this->Pago->find('all', array('conditions'=>array('Prejuridico.empresa'=>$this->Auth->user('empresa')), 'recursive' => 2));

        $this->set(compact('pagos'));

    }
    public function export_excel(){
        $prejuridicos=$this->Prejuridico->find('all', array('conditions'=>array('Prejuridico.empresa'=>$this->Auth->user('empresa')), 'recursive' => 2));

        $this->set(compact('prejuridicos'));

    }
    public function subestado($id){
        return  $this->PrejuridicoSubestado->find('all',array('conditions'=>array('PrejuridicoSubestado.proceso_id'=>$id)));
    }

    //CONSULTAR
    public function search(){


        $valor=$this->request->data['Prejuridico']['valor'];
        $empresa=$this->Auth->user('empresa');
        $criterio=$this->request->data['Prejuridico']['criterio'];


        $opciones= array();
        if(!empty( $this->ids))
        {
            array_push($opciones, array('Prejuridico.id' =>  $this->ids));
        }
        $empresac=" Prejuridico.empresa = ".$empresa."";
        array_push($opciones, $empresac);



        ////-------si no envian datos----------------////


        /* $this->paginate = array(
         'order' => array('Prejuridico.id' =>  'desc'),
         'conditions'=> array('Prejuridico.empresa'=> $this->Auth->user('empresa')),
         'limit' => 10
         );
         $procesos = $this->paginate();
         $total_p=count($procesos);
         $this->set('total_p',$total_p);
         $this->set('procesos',$procesos);*/

        ///-----------si usan el primer filtro---------------------////



        if($valor !=null and $criterio=='nit_cc'):
            $filtro=" Cliente.".$criterio." LIKE  '%".$valor."%' ";
            array_push($opciones, $filtro);
        elseif($valor !=null and $criterio=='nit'):
            $filtro=" Ordenante.".$criterio." LIKE  '%".$valor."%' ";
            array_push($opciones, $filtro);
        elseif($valor !=null and $criterio!=null):
            $filtro=" Prejuridico.".$criterio." LIKE  '%".$valor."%' ";
            array_push($opciones, $filtro);
        endif;

        $procesos = $this->paginate();
        $conditions=array('conditions' => $opciones, 'recursive' => 2);
        $procesos = $this->Prejuridico->find('all',$conditions);
        $total_p=count($procesos);
        $this->set('total_p',$total_p);
        $this->set(compact('procesos'));
        $this->render('index');
    }
    public function searchadv(){

        $empresa=$this->Auth->user('empresa');
        if(!empty($this->data)){
            $ordenante_id=$this->request->data["Prejuridico"]['ordenante_id'];
            $abogado=$this->request->data["Prejuridico"]['abogado'];
            $tproceso_id=$this->request->data["Prejuridico"]['tproceso_id'];
            $pagaduria_id=$this->request->data["Prejuridico"]['pagaduria_id'];
            $juzgado_id=$this->request->data["Prejuridico"]['juzgado_id'];
            $subestado_id=$this->request->data["Prejuridico"]['subestado_id'];
            $dias=$this->request->data["Prejuridico"]['QtyDMora'];
            $ubicacion_id=$this->request->data["Prejuridico"]['ubicacion_id'];
            $cliente_id=$this->request->data["Prejuridico"]['cliente_id'];
            $pendiente_id=$this->request->data["Prejuridico"]['pendiente_id'];
            $opciones= array();
            $empresac=" Prejuridico.empresa = ".$empresa."";
            array_push($opciones, $empresac);

            //---------------si usan el segundo filtro-----------------------------//
            if(!empty($pendiente_id)):
                $pendienteid=" Prejuridico.pendiente_id = ".$pendiente_id."";
                array_push($opciones,$pendienteid);
            endif;
            if(!empty($ubicacion_id)):
                $ubicacion_idc=" Prejuridico.ubicacion_id = ".$ubicacion_id."";
                array_push($opciones,$ubicacion_idc);
            endif;

            if(!empty($ordenante_id)):
                $ordenante_idc=" Prejuridico.ordenante_id = ".$ordenante_id."";
                array_push($opciones, $ordenante_idc);
            endif;

            if(!empty($cliente_id)):
                $cliente_id_idc=" Prejuridico.cliente_id = ".$cliente_id."";
                array_push($opciones, $cliente_id_idc);
            endif;


            if(!empty($abogado)):
                $abogadoc="Prejuridico.Abogado2 = ".$abogado."";
                array_push($opciones, $abogadoc);
            endif;

            if(!empty($tproceso_id)):
                $tproceso_idc=" Prejuridico.tproceso_id = ".$tproceso_id."";
                array_push($opciones, $tproceso_idc);
            endif;

            if(!empty($pagaduria_id)):
                $pagaduria_idc=" Prejuridico.pagaduria_id = ".$pagaduria_id."";
                array_push($opciones, $pagaduria_idc);
            endif;

            if(!empty($juzgado_id )):
                $juzgado_idc=" Prejuridico.juzgado_id = ".$juzgado_id."";
                array_push($opciones, $juzgado_idc);
            endif;

            if(!empty($subestado_id )):
                $subestado_idc=" Prejuridico.subestado_id = ".$subestado_id."";
                array_push($opciones, $subestado_idc);
            endif;
            if(!empty( $this->ids))
            {
                array_push($opciones, array('Prejuridico.id' =>  $this->ids));
            }

            $procesos = $this->paginate();
            $conditions=array('conditions' => $opciones);

            $procesos = $this->Prejuridico->find('all',$conditions);
            $total_p=count($procesos);
            $this->set(compact('procesos','total_p'));
            $this->render('index');
        }

    }

    public function view($id = null){

        $conditions = array('conditions' => array('Prejuridico.id' => $id), 'recursive' => 2);
        $procesos = $this->Prejuridico->find('all', $conditions);

        $proceso = $procesos[0];

        $this->set('proceso', $proceso);


        $pagos = $this->Pago->find('all', array('conditions' => array('Pago.idproceso' => $id, 'tipo' => 'p')));
        $this->set('pagos', $pagos);

        $prejuridicosubestados = $this->PrejuridicoSubestado->find('all', array('conditions' => array('PrejuridicoSubestado.proceso_id' => $id)));
        $this->set('prejuridicosubestados', $prejuridicosubestados);

        //echo "<PRE>";var_dump($prejuridicosubestados); echo "</PRE>";exit;

        $telefonos = $this->ClientesTelefono->find('all', array('conditions' => array('proceso_id' => $id)));
        $this->set('telefonos', $telefonos);



    }
    public function add(){

        if(!empty($this->data)){

            $logprejuridico=array();

            if($this->Prejuridico->save($this->data)){

                $id = $this->Prejuridico->id;

                $user=$this->Auth->user();
                $logprejuridico['proceso_id']=$id;
                $logprejuridico['tproceso_id']=$this->data['Prejuridico']['tproceso_id'];
                $logprejuridico['ordenante_id']=$this->data['Prejuridico']['ordenante_id'];
                $logprejuridico['referencia']='';
                $logprejuridico['cliente_id']=$this->data['Prejuridico']['cliente_id'];
                $logprejuridico['codeudor']=$this->data['Prejuridico']['codeudor'];
                $logprejuridico['fecha_inicio']=$this->data['Prejuridico']['fecha_inicio'];
                $logprejuridico['QtyDMora']=$this->data['Prejuridico']['QtyDMora'];
                $logprejuridico['juzgado_id']=$this->data['Prejuridico']['juzgado_id'];
                $logprejuridico['pagare']=$this->data['Prejuridico']['pagare'];
                $logprejuridico['saldo_int']=$this->data['Prejuridico']['saldo_int'];
                $logprejuridico['pagaduria_id']=$this->data['Prejuridico']['pagaduria_id'];
                $logprejuridico['Abogado']=$this->data['Prejuridico']['Abogado'];
                $logprejuridico['Abogado2']=$this->data['Prejuridico']['Abogado2'];
                $logprejuridico['guia']=$this->data['Prejuridico']['guia'];
                $logprejuridico['guia2']=$this->data['Prejuridico']['guia2'];
                $logprejuridico['ntitulo']=$this->data['Prejuridico']['ntitulo'];
                $logprejuridico['empresa']=$user['empresa'];
                $logprejuridico['subestado_id']=$this->data['Prejuridico']['subestado_id'];
                $logprejuridico['fecha']=date("Y-m-d H:i:s");
                $logprejuridico['username']=$user['username'];
                $logprejuridico['accion']='Creo';
                $this->LogPrejuridico->save($logprejuridico);
                $this->redirect('index');
            }

        }else{
            if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
                $clientes =$this->Cliente->find('list', array('conditions'=>array('Cliente.empresa'=>$this->Session->read('Auth.User.empresa'))));
            }else{
                $clientes = $this->Cliente->find('list');
            }

            $this->set('clientes', $clientes);
        }

    }


    public function edit($id = NULL){

        $this->Prejuridico->id = $id;

        if (empty($this->data)) {

            $prejuridicos = $this->Prejuridico->find('all', array('conditions' => array('Prejuridico.id' =>  $id)));
            $prejuridico = $prejuridicos[0];
            $this->set('prejuridico', $prejuridico);

        } else {


            $id = $this->data['Prejuridico']['id'];

            $this->prejurico_antes= $this->Prejuridico->find('all', array('conditions' => array('Prejuridico.id' =>  $id)));
            $logprejuridico=array();

            $user=$this->Auth->user();

            $logprejuridico['proceso_id']=$id;
            $logprejuridico['tproceso_id']=$this->data['Prejuridico']['tproceso_id'];
            $logprejuridico['ordenante_id']=$this->data['Prejuridico']['ordenante_id'];
            $logprejuridico['referencia']='';
            $logprejuridico['cliente_id']=$this->data['Prejuridico']['cliente_id'];
            $logprejuridico['codeudor']=$this->data['Prejuridico']['codeudor'];
            $logprejuridico['fecha_inicio']=$this->data['Prejuridico']['fecha_inicio'];
            $logprejuridico['QtyDMora']=$this->data['Prejuridico']['QtyDMora'];
            $logprejuridico['juzgado_id']=$this->data['Prejuridico']['juzgado_id'];
            $logprejuridico['pagare']=$this->data['Prejuridico']['pagare'];
            $logprejuridico['saldo_int']=$this->data['Prejuridico']['saldo_int'];
            $logprejuridico['pagaduria_id']=$this->data['Prejuridico']['pagaduria_id'];
            $logprejuridico['Abogado']=$this->data['Prejuridico']['Abogado'];
            $logprejuridico['Abogado2']=$this->data['Prejuridico']['Abogado2'];
            $logprejuridico['guia']=$this->data['Prejuridico']['guia'];
            $logprejuridico['guia2']=$this->data['Prejuridico']['guia2'];
            $logprejuridico['ntitulo']=$this->data['Prejuridico']['ntitulo'];
            $logprejuridico['empresa']=$user['empresa'];
            $logprejuridico['subestado_id']=$this->data['Prejuridico']['subestado_id'];
            $logprejuridico['fecha']=date("Y-m-d H:i:s");
            $logprejuridico['username']=$user['username'];


            $edit='';
            $edit.=intval($this->prejurico_antes[0]['Prejuridico']['tproceso_id'])!=intval($this->data['Prejuridico']['tproceso_id'])?' Tipo Proceso,':'';
            $edit.=intval($this->prejurico_antes[0]['Prejuridico']['ordenante_id'])!=intval($this->data['Prejuridico']['ordenante_id'])?' Ordenante,':'';
            $edit.=intval($this->prejurico_antes[0]['Prejuridico']['cliente_id'])!=intval($this->data['Prejuridico']['cliente_id'])?' Cliente,':'';
            $edit.=trim($this->prejurico_antes[0]['Prejuridico']['codeudor'])!=trim($this->data['Prejuridico']['codeudor'])?' Codeudor,':'';
            $edit.=trim($this->prejurico_antes[0]['Prejuridico']['fecha_inicio'])!=trim($this->data['Prejuridico']['fecha_inicio'])?' Fecha_inicio,':'';
            $edit.=intval($this->prejurico_antes[0]['Prejuridico']['QtyDMora'])!=intval($this->data['Prejuridico']['QtyDMora'])?' QtyDMora,':'';
            $edit.=trim($this->prejurico_antes[0]['Prejuridico']['juzgado_id'])!=trim($this->data['Prejuridico']['juzgado_id'])?' Juzgado,':'';
            $edit.=trim($this->prejurico_antes[0]['Prejuridico']['pagare'])!=trim($this->data['Prejuridico']['pagare'])?' Pagare,':'';
            $edit.=trim($this->prejurico_antes[0]['Prejuridico']['saldo_int'])!=trim($this->data['Prejuridico']['saldo_int'])?' Saldo_int,':'';
            $edit.=intval($this->prejurico_antes[0]['Prejuridico']['pagaduria_id'])!=intval($this->data['Prejuridico']['pagaduria_id'])?' pagaduria_id,':'';
            $edit.=trim($this->prejurico_antes[0]['Prejuridico']['Abogado'])!=trim($this->data['Prejuridico']['Abogado'])?' Abogado,':'';
            $edit.=trim($this->prejurico_antes[0]['Prejuridico']['Abogado2'])!=trim($this->data['Prejuridico']['Abogado2'])?' Abogado2,':'';
            $edit.=trim($this->prejurico_antes[0]['Prejuridico']['guia'])!=trim($this->data['Prejuridico']['guia'])?' guia,':'';
            $edit.=trim($this->prejurico_antes[0]['Prejuridico']['guia2'])!=trim($this->data['Prejuridico']['guia2'])?' guia2,':'';
            $edit.=trim($this->prejurico_antes[0]['Prejuridico']['ntitulo'])!=trim($this->data['Prejuridico']['ntitulo'])?' ntitulo,':'';
            $edit.=intval($this->prejurico_antes[0]['Prejuridico']['empresa'])!=intval($user['empresa'])?' empresa,':'';
            $edit.=intval($this->prejurico_antes[0]['Prejuridico']['subestado_id'])!=intval($this->data['Prejuridico']['subestado_id'])?' subestado_id,':'';
            $logprejuridico['accion']='Actualizo '.trim($edit,',');
            $this->LogPrejuridico->save($logprejuridico);


            $this->Prejuridico->save($this->data);


        }
    }


    public function bitacora($id){


        $logprejuridico=$this->LogPrejuridico->findAllByproceso_id($id);

        $Logtelefonos=$this->Logclientestelefono->findAllByproceso_id($id);


        $Logalbum=$this->Logalbum->findAllBymodel_id($id);
        $Logpicture=$this->Logpicture->findAllByalbum_id($Logalbum[0]['Logalbum']['album_id']);

        $Logdocument=$this->Logdocument->findAllBymodel_id($id);
        $Logarchivo=$this->Logarchivo->findAllBydocument_id($Logdocument[0]['Logdocument']['document_id']);


        $Logbag=$this->Logbag->findAllBymodel_id($id);
        $Logitem=$this->Logitem->findAllBybag_id($Logbag[0]['Logbag']['bag_id']);
        $logetapa=$this->LogPrejuridicoSubestado->findAllByproceso_id($id);

        $logpagos=$this->Logpago->findAllByproceso_id($id);

        //echo "<PRE>"; var_dump($logpagos); echo "</PRE>";exit;
        //exit;

        $this->set(compact('logprejuridico','Logalbum','Logpicture','Logdocument','Logarchivo','Logbag','Logitem','Logtelefonos','logetapa','logpagos'));


        $this->pdfConfig = array(
            'download' => true,
            'filename' => 'Proceso_No' . $id .'.pdf'
        );


    }





}

?>