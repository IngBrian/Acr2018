<p>Hola:<br>
<?= mb_convert_case(mb_strtolower($cliente), MB_CASE_TITLE, "UTF-8") ?> !<br>
Usted ha solicitado recordar su contraseña.  Por favor haga clic <? echo $this->Html->link('AQUI', 'http://www.oficinajuridica.info/RecoveryPasswords/recinfo/?pilot='.md5(date("n")). '&xhane=' .md5(date("h:j")).'&ghs=' .base64_encode($cliente)."!".base64_encode($correo).'&xhe=' .md5(date("h:j")) ); ?> para recuperar su contraseña.   <br>
Sino logra redirigirse, copie el siguiente enlace en su navegador:<br>  <? echo 'http://www.oficinajuridica.info/RecoveryPasswords/recinfo/?pilot='.md5(date("n")). '&xhane=' .md5(date("h:j")).'&ghs=' .base64_encode($cliente)."!".base64_encode($correo).'&xhe=' .md5(date("h:j")); ?></p>
<br><strong>Nombre de Usuario:</strong> <?echo $user;?> <br><br>

Gracias,<br><br>

WebMaster<br>
OficinaJuridica.INFO<br><br><br>


<p style="text-align:justify">
<strong>AVISO DE CONFIDENCIALIDAD:</strong><br> Estos documentos y/o informacioón están dirigidos exclusivamente a los destinatarios de los mismos. Por favor, si Ud. no es el destinatario, notifíquenos este hecho para que le demos instrucciones de lo que debe de hacer con la documentación y/o información recibida. Queda prohibida la copia, difusión o revelación de su contenido a terceros sin el previo consentimiento por escrito de OFICINAJURIDICA.INFO, En caso contrario, vulnerará la legislación vigente. <br>
PROTECCIÓN DE DATOS: En cumplimiento de la Ley Colombiana 1581/2012 y el decreto 1377 de 2013 de Protección de Datos de Carácter Personal, se le informal destinatario que sus datos de contacto están incluidos en un fichero de tratamiento de datos del que es responsable OFICINAJURIDICA.INFO. La finalidad de la recogida y tratamiento de dichos datos es la poder contactar con usted, puede ejercer sus derechos de Acceso, Rectificación, Cancelación u Oposición en cualquier momento dirigiéndose por escrito a la dirección indicada.
</p>