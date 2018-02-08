 <style type="text/css">
 .tg-s6z2{text-align:center; font-family: "Times New Roman", Georgia, Serif;font-weight: bold}
 .tg-031e{text-align: center;font-family: "Times New Roman", Georgia, Serif;color: black; }
 .tg-0810a{text-align:left; font-family: "Times New Roman", Georgia, Serif;font-weight: bold}
  </style>
<table>
  <?php
 //var_dump($logetapa); exit; 
  $i=1;
  ?>
    <h1 class="tg-s6z2" ><br>BITACORA</h1>
  <?php foreach($logprejuridico as $proceso):  ?>
    
  <?php //echo "<PRE>"; var_dump($proceso); echo "</PRE>"; exit; ?>
  
  <tr>
    <td class="tg-0810a" >  ACTO Numero: </td>
    <td class="tg-031e" ><?php echo $proceso['LogPrejuridico']['proceso_id']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >MODIFICACION No: </td>
    <td class="tg-031e" ><?php echo $i ?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >TIPO DE NEGOCIO: </td>
    <td class="tg-031e" ><?php echo $proceso['Tproceso']['nombre']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >NOMBRE DEL VENDEDOR: </td>
    <td class="tg-031e" ><?php echo $proceso['Ordenante']['nombre']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >NOMBRE DEL COMPRADOR: </td>
    <td class="tg-031e" ><?php echo $proceso['Cliente']['nombre_completo']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >NOMBRE OTROS: </td>
    <td class="tg-031e" ><?php echo $proceso['Otros']['nombre_completo']?><br></td>
  </tr>
   <tr>
    <td class="tg-0810a" >FORMA DE PAGO: </td>
    <td class="tg-031e" ><?php echo $proceso['Juzgado']['nombre_juzgado']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >COORDINADOR: </td>
    <td class="tg-031e" ><?php echo $proceso['Asesor1']['nombre']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >NOMBRE DEL GESTOR ACTUAL: </td>
    <td class="tg-031e" ><?php echo $proceso['Asesor2']['nombre']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >TIPO DE PROPIEDAD: </td>
    <td class="tg-031e" ><?php echo $proceso['Pagaduria']['nombre']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >BAÑOS: </td>
    <td class="tg-031e" ><?php echo $proceso['LogPrejuridico']['guia']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >PARQUEADEROS: </td>
    <td class="tg-031e" ><?php echo $proceso['LogPrejuridico']['guia2']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >ALCOBAS: </td>
    <td class="tg-031e" ><?php echo $proceso['LogPrejuridico']['ntitulo']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >ESTRATO: </td>
    <td class="tg-031e" ><?php echo $proceso['LogPrejuridico']['pagare']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >CUANTIA: </td>
    <td class="tg-031e" ><?php echo $proceso['LogPrejuridico']['saldo_int']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >FECHA: </td>
    <td class="tg-031e" ><?php echo $proceso['LogPrejuridico']['fecha_inicio']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >UBICACION: </td>
    <td class="tg-031e" ><?php echo $proceso['Localidades']['nombre'];?><br></td>
  </tr>
    <tr>
    <td class="tg-0810a" >ESTADO: </td>
    <td class="tg-031e" ><?php echo $proceso['Localidades']['nombre'];?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >ETAPA/FILTRO: </td>
    <td class="tg-031e" ><?php echo $proceso['Subestado']['nombre'];?><br></td>
  </tr>
 <tr>
    <td class="tg-0810a" >USUARIO: </td>
    <td class="tg-031e" ><?php echo $proceso['LogPrejuridico']['username']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >FECHA-HORA: </td>
    <td class="tg-031e" ><?php echo $proceso['LogPrejuridico']['fecha']?><br></td>
  </tr>
  <tr>
    <td class="tg-0810a" >ACCION: </td>
    <td class="tg-031e" ><?php echo $proceso['LogPrejuridico']['accion']?><br></td>
  </tr>

  
 <?php
      $i++;
      echo "_____________________________________________________________________________";
      echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
  ?>
  <?php endforeach; $i=1; ?>
</table>
<!-------------------------------------------------------->

 <?php if(!empty($Logtelefonos)) : ?>
 <h1 class="tg-s6z2" ><br>TELEFONOS</h1>
 <table>
      <thead bgcolor="#0000FF">
            <tr>
              <th><?= __('Telefono') ?></th>
              <th><?= __('Contacto') ?></th>
              <th><?= __('Parentesco') ?></th>
              <th><?= __('Fecha') ?></th>
             
          </tr>
      </thead>
    
      <tbody>
        <?php  foreach($Logtelefonos as $telefono) :  ?>
          <tr>
            <td><?= $telefono['Logclientestelefono']['telefono'] ?></td>
            <td><?= $telefono['Logclientestelefono']['contacto'] ?></td>
            <td><?= $telefono['Parentesco']['name'] ?></td>
            <td><?= $telefono['Logclientestelefono']['fecha'] ?></td>
          
           </tr>
       
      </tbody>

     <?php endforeach; 
      echo "_____________________________________________________________________________";
      echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
      endif;  ?>

    </table>
 

<!------------------------------------------------------>    
  
  <?php if(!empty($logetapa)) : ?>
 <h1 class="tg-s6z2" ><br>ETAPAS</h1>
 <table>
      <thead bgcolor="#0000FF">
            <tr>
              <th><?= __('Etapa') ?></th>
              <th><?= __('Observacion') ?></th>
              <th><?= __('Fecha') ?></th>
             
          </tr>
      </thead>
    
      <tbody>
        <?php  foreach($logetapa as $etapa) :  ?>
          <tr>
            <td><?= $etapa['Subestado']['nombre'] ?></td>
            <td><?= $etapa['LogPrejuridicoSubestado']['observaciones'] ?></td>
            <td><?= $etapa['LogPrejuridicoSubestado']['fecha'] ?></td>
          </tr>
       
      </tbody>

     <?php endforeach; 
      echo "_____________________________________________________________________________";
      echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
      endif;  ?>
  </table>
 

<!--------------------------------------------------- -->

  <?php if(!empty($Logalbum)): ?>
 
  <h1  class="tg-s6z2"><br>ALBUM IMAGENES</h1>
 <table>

  <thead>
    <tr>
      <td><?= __('Nombre del Album') ?> </td>
      <td><?= __('Fecha') ?> </td>
    </tr>
  </thead>
  <tbody>
  <?php foreach($Logalbum as $album):  ?>
  <tr>
     <td ><?php echo $album['Logalbum']['title']?></td>
     <td ><?php echo $album['Logalbum']['created']?></td>
  </tr>
  </tbody>
  <?php  endforeach; 
 echo "_____________________________________________________________________________";
      echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
  endif;?>


   </table>

<br>
<?php 
if(!empty($Logpicture)): ?>
<h1 class="tg-s6z2"><br>GALERIA IMAGENES </h1>

  <table>
    <thead>
      <tr>
        <td><?= __('Nombre') ?></td>
        <td><?= __('Fecha') ?></td>
        <td><?= __('Username') ?></td>
        <td><?= __('Accion') ?></td>
      </tr>
    </thead>

    <tbody>
  <?php foreach($Logpicture as $picture):  ?>
  <tr>
    <td ><?php echo $picture['Logpicture']['name']?></td> 
    <td><?php echo $picture['Logpicture']['created']?></td>
    <td><?php echo $picture['Logpicture']['username']?></td>
    <td><?php echo $picture['Logpicture']['accion']?></td>
  </tr>
</tbody>
<?php  endforeach;
 echo "_____________________________________________________________________________";
      echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
 endif;?>
 
</table>

<!------------------------------------------------------ -->

<?php if(!empty($Logdocument)) :?>
<h1  class="tg-s6z2"><br>ALBUM DOCUMENTOS</h1>
<table>
  <thead>
    <tr>
      <td><?= __('Nombre') ?>
      <td><?= __('Fecha') ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($Logdocument as $document):  ?>
      <tr>
        <td ><?php echo $document['Logdocument']['title']?></td> 
        <td  ><?php echo $document['Logdocument']['created']?></td>
      </tr>
  </tbody>
<?php endforeach; 
 echo "_____________________________________________________________________________";
      echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>"; endif;?>


</table>

<?php if(!empty($Logarchivo)): ?>
  <h1 class="tg-s6z2"><br>GALERIA DOCUMENTOS</h1>
  <table>
    <thead>
      <tr>
      <td><?= __('Nombre') ?></td>
      <td><?= __('Fecha') ?></td>
       <td><?= __('Username') ?></td>
        <td><?= __('Accion') ?></td>
    </tr>
    </thead>
<tbody>
  <?php foreach($Logarchivo as $archivo):  ?>
    <tr>
      <td><?php echo $archivo['Logarchivo']['name']?></td>
      <td><?php echo $archivo['Logarchivo']['created']?></td>
      <td><?php echo $archivo['Logarchivo']['username']?></td>
      <td><?php echo $archivo['Logarchivo']['accion']?></td>
    </tr>
</tbody>
<?php endforeach;
 echo "_____________________________________________________________________________";
      echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
 endif;?>
</table>


<!------------------------------------------------------------------------- -->

<?php if(!empty($Logbag)): ?>
<h1 class="tg-s6z2"><br>ALBUM MULTIMEDIAS</h1>
<table>
  <thead>
    <tr>
      <td> <?= __('Nombre') ?>
      <td> <?= __('Fecha') ?>
    </tr>
  </thead>
  <tbody>
<?php foreach($Logbag as $bag):  ?>
  <tr>
    <td  ><?php echo $bag['Logbag']['title']?></td>
    <td  ><?php echo $bag['Logbag']['created']?></td>
  </tr>
  </tbody>
<?php endforeach;
 echo "_____________________________________________________________________________";
      echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
 endif;?>
</table>

<?php if(!empty($Logitem)):?>
  <h1 class="tg-s6z2"><br>GALERIA VIDEOS</h1>
  <table>
  <thead>
    <tr>
      <td><?= __('Nombre') ?></td>
      <td><?= __('Fecha') ?></td>
       <td><?= __('Username') ?></td>
        <td><?= __('Accion') ?></td>
    </tr>
  </thead>
<tbody>
<?php foreach($Logitem as $item):  ?>
  <tr>
    <td><?php echo $item['Logitem']['name']?></td>
    <td><?php echo $item['Logitem']['created']?></td>
    <td><?php echo $item['Logitem']['username']?></td>
    <td><?php echo $item['Logitem']['accion']?></td>
  </tr>

</tbody>
<?php endforeach; 
 echo "_____________________________________________________________________________";
      echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
endif; ?>
</table>


<?php if(!empty($logpagos)):?>
  <h1 class="tg-s6z2"><br>REGISTRO DE PAGOS</h1>
  <table>
  <thead>
    <tr>
      <td><?= __('Fecha') ?></td>
      <td><?= __('Valor') ?></td>
      <td><?= __('Observacion') ?></td>
    </tr>
  </thead>
<tbody>
<?php foreach($logpagos as $pago):  ?>
  <tr>
    <td><?php echo $pago['Logpago']['fecha_pago']?></td>
    <td><?php echo $pago['Logpago']['valor']?></td>
    <td><?php echo $pago['Logpago']['observacion']?></td>
  </tr>

</tbody>
<?php endforeach; 
 echo "_____________________________________________________________________________";
      echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
endif; ?>
</table>
