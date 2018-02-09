<?php session_start();
?>
<?php $this->Html->css(array(
    'Gallery.style'
),
    array('block' => 'css')) ?>
<style >
 .informacion
 {
width: 500px;
height: 600px;
position: absolute;
left: 50px;
top:0px;
 }    
 .col-sm-6.col-md-3
 {
    position: relative;
    left: 850px;
 }
</style>
<?php
if ($user['role']=='visitante') {
    echo '<h1>No tienes permiso para ver esta galeria</h1>';
}
else
{


    ?>
        <div class="row">
            <div class="col-md-10">

                <h2><?php echo $page_title ?></h2>
            </div>


        <div class="panel-heading">
           <div class="col-md-10">

                <?php echo $this->Html->link('Retornar', '/prejuridicos/view/'.$model_id, array('class' => 'btn btn-primary pull-right',    'style'=>'margin-top: 10px',)); ?>
           </div>


            <div class="col-md-2">
                  <?php echo $this->Gallery->linkd("$model_id","$model_id",
                    array('class' => 'btn btn-primary pull-right', 'style' => 'margin-top: 10px',)
                ); ?>
            </div>

          </div>
        </div>

        <hr/>

        <div class="row">
            <div class="col-md-12">
                <div class="row">

                    <?php if (empty($galleries)) { ?>
                        <div class="container-empty">
                            <div class="img"><i class="fa fa-picture-o"></i></div>
                            <h2>Usted aun no tiene <?php //echo $search_status ?> Albunes publicados.</h2>
                            <br/>

                            <?php echo $this->Gallery->linkd("$model_id", "$model_id",
                                array('class' => 'btn btn-primary', 'style' => 'margin-top: 10px')
                            ); ?>
                        </div>
                    <?php } else { ?>
                        <?php foreach ($galleries as $gallery) { ?>
                            <a
                                href="<?php echo $this->Html->url(
                                    array(
                                        'controller' => 'documents',
                                        'action' => 'view',
                                        'plugin' => 'gallery',
                                        $gallery['Document']['id'],
                                        $model_id
                                    )
                                ) ?>">
                                <div class="col-sm-6 col-md-3">
                                                                        <?php
                            foreach ($_SESSION['prueba'] as $proceso) {
                                if ($gallery['Document']['model']==$proceso['Prejuridico']['id']) {
                                    $fecha_inicio=$proceso['Prejuridico']['fecha_inicio'];
                                    $pagare=$proceso['Prejuridico']['pagare'];
                                    $nombre_juzgado=$proceso['Juzgado']['nombre_juzgado'];
                                    $partes=$proceso['Ordenante']['nombre'].' -- '.$proceso['Cliente']['nombre_completo'];
                                    $cuantia=$proceso['Prejuridico']['saldo_int'];
                                    $dias_actividad=abs(strtotime($proceso['Prejuridico']['fecha_inicio'])-strtotime(date('Y-m-d')))/86400;
                                    $ubicacion=$proceso['Localidade']['nombre'];
                                    $gestor_inicial=$proceso['Asesor1']['nombre'];
                                    $gestor_actual=$proceso['Asesor2']['nombre'];
                                    $otros=$proceso['Otros']['nombre_completo'];
                                    $pagaduria=$proceso['Pagaduria']['nombre'];
                                    $citaciones=$proceso['Prejuridico']['guia'];
                                    $aviso=$proceso['Prejuridico']['guia2'];
                                    $obligacion=$proceso['Prejuridico']['ntitulo'];
                                    $etapa=$proceso['Subestado']['nombre'];
                                    $id=$proceso['Prejuridico']['id'];
                                    $Pendiente=$proceso['Pendiente']['nombre'];
                                    $tipoacto=$proceso['Tproceso']['nombre'];
                                }
                            }
                            ?>
                                   <?php $picture_url = $this->Gallery->pathUrl($gallery['Archivo'][0]['name'])?>

                                    <div class="thumbnail <?php echo $search_status ?>">
                                        <?php $picture_url = !empty($picture_url) ? $picture_url : $picture_url="/tesisuac/files/documentos/icons/iError.png"; ?>
                                    <img src="<?php echo $picture_url ?>" alt="...">




                                        <div class="caption">
                                            <h4>
                                                <?php if ($gallery['Document']['status'] == 'draft') { ?>
                                                    <i class="fa fa-pagelines"></i>
                                                <?php } else { ?>
                                                <?php } ?>
                                                <?php echo $gallery['Document']['title'] ?>
                                            </h4>
                                            <h5><i
                                                    class="fa fa-calendar"></i> <?php echo $this->Time->format(
                                                    $gallery['Document']['created'],
                                                    '%B %e, %Y %H:%M %p'
                                                ) ?>
                                            </h5>
                                            <h5><i class="fa fa-camera-retro"></i> <?php echo count($gallery['Archivo']) ?></h5>


                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="informacion">
              <p align="justify"><b>FECHA INICIO </b> <?php echo $fecha_inicio ?></p>
              <p align="justify"><b>ESTRATO </b><?php echo $pagare ?></p>
              <p align="justify"><b>FORMA DE PAGO </b><?php echo $nombre_juzgado ?></p>
              <?php 
                  if ($user['role']!='visitante') {              
              ?>
              <p align="justify"><b>PARTES </b>  <?php echo $partes ?></p>
              <?php }?>
              <p align="justify"><b>CUANTIA </b><?php echo $cuantia ?></p>
              <p align="justify"><b>DIAS ACTIVIDAD </b><?php echo $dias_actividad ?></p>
              <p align="justify"><b>UBICACION </b>  <?php echo $ubicacion ?></p>
              <p align="justify"><b>COORDINADOR </b><?php echo $gestor_inicial ?></p>
              <p align="justify"><b>GESTOR ACTUAL </b>  <?php echo $gestor_actual ?></p>
              <p align="justify"><b>OTROS </b><?php echo $otros ?></p>
              <p align="justify"><b>TIPO DE NEGOCIO </b><?php echo $tipoacto ?></p>
              <p align="justify"><b>PENDIENTE </b><?php echo $Pendiente ?></p>
              <p align="justify"><b>TIPO DE PROPIEDAD </b><?php echo $pagaduria ?></p>
              <p align="justify"><b>BAÑOS </b><?php echo $citaciones ?></p>
              <p align="justify"><b>PARQUEADEROS </b>  <?php echo $aviso ?></p>
              <p align="justify"><b>ALCOBA </b><?php echo $obligacion ?></p>
              <p align="justify"><b>ETAPA FILTRO </b><?php echo $etapa ?></p>
              </div>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div>
        </div>

        <hr/>
<?php } ?>
