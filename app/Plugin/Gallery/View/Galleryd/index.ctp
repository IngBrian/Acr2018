<?php $this->Html->css(array(
    'Gallery.style'
),
    array('block' => 'css')) ?>
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
                        <?php } ?>
                    <?php } ?>

                </div>
            </div>
        </div>

        <hr/>
<?php } ?>