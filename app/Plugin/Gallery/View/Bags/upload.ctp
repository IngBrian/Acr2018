<?php $this->Html->script(
    array(
        'Gallery.lib/dropzone.min.js',
        'Gallery.scriptsdv.js',
        'Gallery.html5lightbox.js'

    ),
    array('block' => 'js')
); ?>

<?php $this->Html->css(array(
    'Gallery.dropzone',
    'Gallery.style'
),
    array('block' => 'css')) ?>

<div id="albumInfo" data-album-id="<?php echo $bag['Bag']['id'] ?>"
     data-post-url="<?php echo Router::url(array('plugin' => 'gallery',
         'controller' => 'items',
         'action' => 'upload')) ?>"></div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default panel-container-album">
            <div class="panel-heading">
                <h2 class="panel-title pull-left">
                    <i class="fa fa-picture-o"></i>
                    <?php echo $bag['Bag']['title'] ?>
                </h2>

                <?php echo $this->Html->link(
                    '<i class="fa fa-cloud-upload"></i> ' . __d('gallery', 'Subir Multimedia'),
                    'javascript:void(0)',
                    array(
                        'escape' => false,
                        'class' => 'uploadButton btn btn-success btn-sm pull-right'
                    )
                ); ?>
                
                <?php echo $this->Html->link(
                    '<i class="fa fa-external-link"></i> ' . __d('gallery', 'Ver Multimedia'),
                    array(
                        'controller' => 'bags',
                        'action' => 'view',
                        $bag['Bag']['id'],
                        $model_id,
                        'plugin' => 'gallery'
                    ),
                    array(
                        'data-toggle' => 'modal',
                        'escape' => false,
                        'target' => '_blank',
                        'class' => 'btn btn-info btn-sm pull-right',
                        'style' => 'margin-right: 10px; margin-left: 10px'
                    )
                ); ?>

                <a href="javascript:void(0)" class="btn btn-sm btn-primary open-config pull-right" style="margin-right: 10px; margin-left: 10px">
                    <i class="fa fa-cog"></i> <?php echo __d('gallery', 'Opciones'); ?>
                </a>
                 
     <?php echo $this->Html->link('Retornar', '/gallerydv/index/'.$model_id, array('class' => 'btn btn-info btn-sm pull-right','style'=>'margin-right: 0px; margin-left: 10px')); ?>
                  

                <div class="clearfix"></div>
            </div>
            <div class="panel-body uploader-panel">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $data = $this->Js->get('#BagUpdateForm')->serializeForm(
                            array('isForm' => true, 'inline' => true)
                        );
                        $this->Js->get('#BagUpdateForm')->event(
                            'submit',
                            $this->Js->request(
                                array('action' => 'update'),
                                array(
                                    'update' => '#folderStatus',
                                    'data' => $data,
                                    'async' => true,
                                    'dataExpression' => true,
                                    'method' => 'POST',
                                    'complete' => 'toastr.success("Archivo Guardado!"); $(".panel.options").slideToggle()'
                                )
                            )
                        );
                        echo $this->Form->create('Gallery.Bag', array('action' => 'update', 'default' => false));
                        ?>
                        <div class="panel panel-success options">
                            <div class="panel-heading options">
                                <h3 class="panel-title">
                                    <i class="fa fa-cog"></i>
                                    <?php echo __d('gallery', 'Opciones del Album'); ?>
                                </h3>
                            </div>
                            <div class="panel-body options">
                                <?php if (!empty($bag)) { ?>
                                    <?php echo $this->Form->input('id', array('value' => $bag['Bag']['id'])) ?>
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input(
                                            'title',
                                            array(
                                                'value' => !empty($bag) ? $bag['Bag']['title'] : '',
                                                'label' => __d('gallery', 'Album title'),
                                                'placeholder' => 'Ex: xbox-360'
                                            )
                                        ) ?>

                                    </div>
                                    <div class="col-md-3">
                                        <?php echo $this->Form->input(
                                            'tags',
                                            array(
                                                'value' => !empty($bag) ? $bag['Bag']['tags'] : '',
                                                'label' => __d('gallery', 'Etiquetas (Separados por comas)'),
                                                'placeholder' => 'Ex: Barranquilla, sol, Colombia'
                                            )
                                        ) ?>
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""><?php echo __d('gallery', 'Estado'); ?></label>

                                        <div class="manipulation">
                                            <?php echo $this->Form->input(
                                                'status',
                                                array(
                                                    'type' => 'radio',
                                                    'value' => !empty($bag) ?  'published':$bag['bag']['status'] ,
                                                    'legend' => false,
                                                    'separator' => '',
                                                    'options' => array(
                                                        'published' => __d('gallery', 'Publicada')
                                                    )

                                                )
                                            ) ?>
                                        </div>


                                    </div>


                                </div>
                            </div>
                            <div class="panel-footer options">

                                <button class="btn btn-success pull-left btn-sm">
                                    <i class="fa fa-check"></i>
                                    <?php echo __d('gallery', 'Guardar'); ?>
                                </button>
                                <a href="javascript:void(0)" class="btn btn-default btn-sm pull-left close-config"
                                   style="margin-left: 10px"><?php echo __d('gallery', 'Cerrar'); ?></a>

                                <button type="button" class="btn btn-warning btn-sm pull-right popovertrigger"
                                        style="margin-left: 10px"
                                        data-container="body" data-toggle="popover" data-placement="left" data-content="<ul>
                <li><?php echo __d('gallery', 'Use the top form to update your gallery information, such as name, tags or publish status.'); ?></li>
                <li><?php echo __d('gallery', 'To upload new images to this album, press the upload button.'); ?></li>
                <li><?php echo __d('gallery', 'Drag the pictures to reorder your gallery. (Dont worry, this changes are saved automatically)'); ?></li>
                <li><?php echo __d('gallery', 'If you delete this album, all its images will be deleted as well.'); ?></li>
                <li><?php echo __d('gallery', 'The first image of the album will be considered as the cover. To change the cover just drag the image you want to mark as a cover at the first position of the grid'); ?></li>
                </ul>">
                                    <i class="fa fa-info-circle"></i> <?php echo __d('gallery', 'Ayuda'); ?>
                                </button>

                                <?php echo $this->Html->link(
                                    '<i class="fa fa-trash-o" ></i> ' . __d('gallery', 'Eliminar Album'),
                                    array(
                                        'controller' => 'bags',
                                        'action' => 'delete',
                                        'plugin' => 'gallery',
                                        $bag['Bag']['id']
                                    ),
                                    array(
                                        'escape' => false,
                                        'style' => 'text-align: right; color: red',
                                        'class' => 'pull-right btn btn-sm confirm-delete'
                                    )
                                ); ?>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                        </form>
                        <?php echo $this->Js->writeBuffer(); ?>
                    </div>
                </div>
                <div id="container-pictures">
                    <ul class="row" id="sortable"></ul>
                    <?php if (!count($bag['Item'])) { ?>
                        <div class="container-empty">
                            <div class="img"><i class="fa fa-picture-o"></i></div>
                            <h2><?php echo __d('gallery', "Este Album de bagos no tiene archivos aun."); ?></h2>
                            <br/>
                            <a href="javascript:void(0)" class="btn btn-success uploadButton">
                                <i class="fa fa-cloud-upload"></i>
                                <?php echo __d('gallery', 'Pulsa click en subir archivo o arrastra el archivo aqui. '); ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="folderinfo"
     data-public-folder-path="<?php echo $this->params->webroot . "files/multimedia/" . $bag['Bag']['id'] . "/" ?>"></div>

<div id="uploadContainer">
    <div id="previews" class="dropzone-previews"></div>
    <div class="clearfix"></div>
    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"
         aria-valuenow="0">
        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
    </div>
</div>


<script type="x-tmpl-mustache" id="pictureBoxTemplate">
<li class="col-xs-6 col-md-3 ui-state-default" alt="{{id}}"
    id="{{id}}">
    <div class="thumbnail th-pictures-container" style="position: relative">
        <a href="{{path}}" target="_blank" title="{{caption}}" class=""><img src="{{url}}" alt=""></a>
        <div class="image-actions">
            <a href="javascript:void(0)" class="remove-picture pull-left"
               data-file-id="{{id}}">
                <i class="fa fa-trash-o"></i>
            </a>
        </div>
        <div class="image-caption caption">
            <div class="text" data-id="{{id}}">{{caption}}</div>

        </div>
        <div class="clearfix"></div>
    </div>
</li>
</script>
