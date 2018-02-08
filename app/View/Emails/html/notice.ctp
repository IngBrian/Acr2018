<p>Señor:<br>
<?= mb_convert_case(mb_strtolower($cliente), MB_CASE_TITLE, "UTF-8") ?> <br>
Direccion: <?= $direccion ?><br>
Ciudad: <?= $ciudad ?></p>
<h4>REF: AVISO DE COBRO.</h4><br><br>


Cordial Saludo,<br><br>


<p style="text-align:justify">Por medio del presente escrito, nos dirigimos a usted en su calidad de deudor 
o codeudor a fin de exponer que la obligación que presenta con  <b><?= mb_convert_case(mb_strtolower($demandante), MB_CASE_TITLE, "UTF-8") ?></b>,
se encuentra vencida, para tal efecto, le solicitamos se acerque a nuestras oficinas a fin de exponerle
las alternativas de normalización de cartera y pueda seguir disfrutando los privilegios de un 
cliente al día en el pago de sus obligaciones frente a la entidad.<br><br>

A continuación se describimos las obligaciones que presentan saldo pendiente según nuestro
sistema de cartera:<br><br>

No. crédito <?= $credito ?><br>
Saldo obligación: <?= $saldo ?><br>
Dias en mora: <?= $mora ?> <br><br><br>

La no comparecencia a nuestras instalaciones para la normalización de sus obligaciones
en un termino de 48 horas al recibido de este comunicado se entenderá como animo no 
conciliatorio y procederemos hacer efectiva la obligación por la vía judicial.
Si ya realizo el pago de su obligación, haga caso omiso al presente.</p><br><br><br><br>




Cordialmente, <br><br><br><br><br>





_________________________________________<br>
<b>DEPARTAMENTO DE CARTERA</b>