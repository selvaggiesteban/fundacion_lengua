<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Deshabilitar la comprobación de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Eliminar todas las plantillas existentes para asegurar que solo las definidas esten presentes
        DB::table('email_templates')->truncate();

        // Insertar las plantillas únicas identificadas en la conversación
        DB::table('email_templates')->insert([
            [
                'title' => 'DAT',
                'subject' => 'DATOS DEL CURSO DE ESPAÑOL',
                'body' => <<<HTML
<p>Los datos de tu alojamiento son:</p>
<ul>
<li>Direcci&oacute;n: <strong>{aloDireccion}</strong></li>
<li>Persona de contacto: <strong>{aloContacto}</strong></li>
<li>Tel&eacute;fono: <strong>{aloTelefono}</strong></li>
<li>email: <strong>{aloEmail}</strong></li>
<li>Mapa: <strong>{aloMaps}</strong></li>
</ul>
<p></p>
<p>IMPORTANTE: Es conveniente que contactes con la persona del alojamiento para informarle sobre tu hora aproximada de llegada.</p>
<p>IMPORTANT: It is convenient for you to contact the person from your accommodation to inform about your arrival time.</p>
<p><br />Estimad@ <strong>{regNombre}</strong></p>
<p>&iexcl;Hola!</p>
<p><br /><span>Me llamo Anabel y ser&eacute; tu contacto en la Fundaci&oacute;n para la Difusi&oacute;n de la Lengua y Cultura Espa&ntilde;ola desde hoy hasta que finalices tu curso de espa&ntilde;ol. Quiero comentarte varios detalles antes de empezar el curso de espa&ntilde;ol:</span></p>
<p><img src="http://www.fundacionlengua.com/extra/imagenes/img_73/LOGO-CON-TITULOS/curso.png" alt="" width="150" height="52" /></p>
<p><em>ATENCI&Oacute;N: debido al gran volumen de alumnos, el lugar donde recibir&aacute;s las clases de espa&ntilde;ol podr&iacute;a cambiar. Te mantendremos informado</em>.</p>
<p>Nos has contratado para que te ayudemos a aprender y mejorar tu espa&ntilde;ol, y para ello es muy importante que la organizaci&oacute;n sea precisa y lo m&aacute;s puntual posible.<br />Deber&aacute;s estar en la sede de la Fundaci&oacute;n: (sigue el <a href="http://www.fundacionlengua.com/es/contactar/sec/46/">link</a> para datos de contacto)</p>
<table border="0">
<tbody>
<tr>
<td>
<p>Con servicios contratados: 9.00h. &nbsp;</p>
<p>Sin servicios contratados: 9.20h.</p>
</td>
<td><a href="http://www.fundacionlengua.com/es/contactar/sec/46/"><img src="http://www.fundacionlengua.com/extra/imagenes/img_73/LOGO-CON-TITULOS/piruleta.png" alt="" width="50" height="50" /></a></td>
</tr>
</tbody>
</table>
<p>Para aquellos que ten&eacute;is que pagar alg&uacute;n servicio contratado, el periodo de pago se abre a las 9 h. en la sede de la Fundaci&oacute;n el d&iacute;a de inicio del curso. Los que no teng&aacute;is que pagar ning&uacute;n servicio, deb&eacute;is presentaros a las 9:20 h.<br />El curso comienza el lunes a las 9:30 h. de la ma&ntilde;ana en la sede de la Fundaci&oacute;n, en Calle Fray Luis de Le&oacute;n n&ordm; 1-1&ordm;B, en pleno centro de la ciudad. <a href="https://www.google.com/maps/place/Fundaci%C3%B3n+de+la+Lengua+Espa%C3%B1ola/@41.651841,-4.724343,13z/data=!4m5!3m4!1s0x0:0xaccdd9d233e1288b!8m2!3d41.6518642!4d-4.7243205?hl=es">(mapa)</a> En principio hemos conformado los grupos en funci&oacute;n del nivel que nos hab&eacute;is dicho que ten&eacute;is, pero el equipo pedag&oacute;gico realizar&aacute; los ajustes pertinentes si considera que hay que realizar cambios, con el objetivo de optimizar el aprendizaje en el aula. Este primer d&iacute;a traed calzado c&oacute;modo, porque realizaremos una visita tur&iacute;stica por la ciudad de Valladolid que durar&aacute; unas dos horas.</p>
<p>El curso finalizar&aacute;, como todos los d&iacute;as, a las 13.30h. A media ma&ntilde;ana dispondr&aacute;s de un peque&ntilde;o descanso para retomar fuerzas (de 11:20 a 11:40 H)</p>
<p>Si vas a tener tel&eacute;fono m&oacute;vil durante tu estancia en Espa&ntilde;a, por favor, danos el n&uacute;mero para cualquier incidencia.</p>
<p>Necesitamos una serie de datos que vas a tener que remitirnos con la mayor brevedad posible para poder organizar tu curso de espa&ntilde;ol:</p>
<p><img src="http://www.fundacionlengua.com/extra/imagenes/img_73/LOGO-CON-TITULOS/nivel-de-espanol.png" alt="" width="150" height="54" /></p>
<p>Aunque te realizaremos un test de nivel el primer d&iacute;a, para poder organizar los grupos, necesitamos saber tu nivel de espa&ntilde;ol:</p>
<table border="0">
<tbody>
<tr>
<td>
<ul>
<li>Puede que ya lo hayas puesto en la hoja de inscripci&oacute;n.</li>
<li>Si ese apartado no lo hab&iacute;as rellenado en la hoja de inscripci&oacute;n, env&iacute;ame un mail con tu nivel de espa&ntilde;ol. Si no sabes tu nivel, puedes realizar un test de nivel en el siguiente <a href="http://ave.cervantes.es/prueba_nivel/registro/test_de_clasificacion.php?origen=webAVE">link</a>.</li>
</ul>
</td>
<td><a href="http://ave.cervantes.es/prueba_nivel/registro/test_de_clasificacion.php?origen=webAVE"><img src="http://www.fundacionlengua.com/extra/imagenes/img_73/LOGO-CON-TITULOS/piruleta.png" alt="" width="50" height="50" /></a></td>
</tr>
</tbody>
</table>
<p><img src="http://www.fundacionlengua.com/extra/imagenes/img_73/LOGO-CON-TITULOS/pago-servicios.png" alt="" width="150" height="52" /></p>
<p><strong>IMPORTANTE: El pago</strong> del alojamiento y otros servicios, si los has contratado, <strong>debe haberse realizado 10 d&iacute;as antes de tu llegada</strong>:</p>
<table border="0">
<tbody>
<tr>
<td>&bull; Mediante tarjeta de cr&eacute;dito, rellenando desde aqu&iacute;:<br /><a title="Pagar curso" href="http://www.fundacionlengua.com/es/pagos-fundacion/sec/213/?nombrecompleto={regNombre}&amp;referencia={regId}&amp;concepto=Pago%20pendiente">http://www.fundacionlengua.com/es/pagos-fundacion/sec/213/?nombrecompleto={regNombre}&amp;referencia={regId}&amp;concepto=Pago%20pendiente</a><br />&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  Nombre completo: tu nombre<br />&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  Importe: la cantidad pendiente<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;  Referencia: tu n&uacute;mero de inscripci&oacute;n<br />&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;  Concepto: lo que est&aacute;s pagando<br />&bull; Transferencia bancaria, indicando tu n&uacute;mero de inscripci&oacute;n.<br />
<p style="margin-left: 30px;"><strong>Banco: CAIXABANK Centro Empresas</strong></p>
<p style="margin-left: 30px;"><strong>Direcci&oacute;n:&nbsp; Calle Regalado, 4</strong>, 47002 Valladolid</p>
<p style="margin-left: 30px;"><strong>C/C:</strong><span>&nbsp;2100 8543 1613 0036 4423</span><br /><strong>IBAN:</strong>&nbsp;<span>ES51 2100 8543 1613 0036 4423</span><br /><strong>BIC/SWIFT:&nbsp;<strong>CAIXESBBXXX</strong></strong></p>
</td>
<td><a href="http://www.fundacionlengua.com/es/pagos-tarjeta/sec/213/"><img src="http://www.fundacionlengua.com/extra/imagenes/img_73/LOGO-CON-TITULOS/piruleta.png" alt="" width="50" height="50" /></a></td>
</tr>
</tbody>
</table>
<p><img src="http://www.fundacionlengua.com/extra/imagenes/img_73/LOGO-CON-TITULOS/alojamiento.png" alt="" width="150" height="53" /></p>
<p>El alojamiento, por norma, comienza el domingo por la tarde, a partir de la 17:00 hs. (un d&iacute;a antes del inicio del curso) y termina el s&aacute;bado por la ma&ntilde;ana, antes de las 12:00 hs. (un d&iacute;a despu&eacute;s de la finalizaci&oacute;n del curso). Si necesitas contratar d&iacute;as extra, puedes hacerlo notific&aacute;ndolo con antelaci&oacute;n.</p>
<p>Para poder coordinar el alojamiento, si has elegido que nosotros lo gestionemos, necesitamos que nos digas:</p>
<ul>
<li>  C&oacute;mo vas a llegar a Valladolid (tren, bus, avi&oacute;n, etc.)</li>
<li>  Cu&aacute;ndo vas a llegar (d&iacute;a y hora de llegada a Valladolid)</li>
</ul>
<p>Adjunto las normas de <a href="http://www.fundacionlengua.com/es/normas-alojamiento-familia/art/4615/">alojamiento en familia</a>, en caso de que hayas elegido esa modalidad de alojamiento.</p>
<p></p>
<p><img src="http://www.fundacionlengua.com/extra/imagenes/img_73/LOGO-CON-TITULOS/transporte.png" alt="" width="150" height="54" /></p>
<p>Si has contratado el transporte, por favor env&iacute;anos los detalles del vuelo de llegada y de partida. En cuanto los tengamos, te haremos llegar tu billete de tren o autocar en funci&oacute;n de la hora de llegada al aeropuerto junto con las instrucciones para llegar a la estaci&oacute;n correspondiente.</p>
<p>Normalmente los billetes se envian pocos d&iacute;as antes de tu llegada por si hubiera alg&uacute;n cambio de &uacute;ltima hora en tu vuelo.</p>
<p><img src="http://www.fundacionlengua.com/extra/imagenes/img_73/LOGO-CON-TITULOS/seguro.png" alt="" width="150" height="52" /></p>
<table border="0">
<tbody>
<tr>
<td>Si contrataste el seguro, te haremos llegar una copia del<br />mismo por correo electr&oacute;nico para que puedas iniciar<br />tu viaje completamente asegurad@. Consulta las<br />condiciones del seguro en el siguiente&nbsp;<a href="http://www.fundacionlengua.com/extra/descargas/des_65/MultiasistenciaCondGenerales-2010.pdf">link</a>.</td>
</tr>
</tbody>
</table>
<p><img src="http://www.fundacionlengua.com/extra/imagenes/img_73/LOGO-CON-TITULOS/excursiones.png" alt="" width="150" height="41" /></p>
<p><span>El curso tiene programada una o dos excursiones optativas, con un precio de 50 &euro;, que incluye el viaje en autocar privado y el acompa&ntilde;amiento en la visita con un gu&iacute;a/profesor. La comida y las entradas a los museos no est&aacute;n incluidas. Se puede comer en un restaurante, pero tambi&eacute;n al aire libre (si tienes alojamiento en familia o residencia universitaria te pueden preparar un pic-nic o puedes cambiar la comida por la cena):</span></p>
<p>  Salida a las 9:00 h. y regreso a las 19:00 h (aprox.).</p>
<ul>
<li>Salamanca</li>
<li>Segovia, ...</li>
</ul>
<p>Es necesario inscribirse los dos d&iacute;as primeros de clase y pagar con anticipaci&oacute;n.&nbsp;Es necesario un n&uacute;mero m&iacute;nimo de 12 participantes para realizar la excursi&oacute;n.</p>
<p>&nbsp;</p>
<p>Por favor, no dudes en contactar conmigo si tienes alguna pregunta, por los siguientes medios:</p>
<p>Mail: hola@fundacionlengua.es</p>
<p>T&eacute;fono m&oacute;vil: 0034&nbsp;692 722 751</p>
<p>Tel&eacute;fono fijo: 0034 - 983 15 01 14</p>
<p>&nbsp;</p>
<hr />
<p>Hello,</p>
<p><br />My name is Anabel and from now on, I Iwill be your contact person before and during your stay in Fundaci&oacute;n para la Difusi&oacute;n de la Lengua y Cultura Espa&ntilde;ola. I&acute;d like to inform you about some details before the beginning of&nbsp; your Spanish course in Fundaci&oacute;n.</p>
<h3>SPANISH COURSE</h3>
<p>You want us to help you to learn and improve your Spanish level. That means, it is very important all the organization to be precise. You have to be at the&nbsp;<span>Headquarters</span> of Fundaci&oacute;n:</p>
<ul>
<li><a href="http://www.fundacionlengua.com/en/contactar/sec/46/">With contracted services:&nbsp;9 h.</a></li>
<li><a href="http://www.fundacionlengua.com/en/contactar/sec/46/">Without contracted services: 9:20 h.</a></li>
</ul>
<p>For those who have to pay any contracted service, the period of payment will be opened at&nbsp;9 AM, at the headquarters of the Fundaci&oacute;n, the day of the beginning of the course. For those who do not have to pay fo any service, please come to&nbsp; Fundaci&oacute;n at 9:20 AM.<br />The course begins on Monday at 9:30 AM at the headquarters of the Fundaci&oacute;n de la Lengua Espa&ntilde;ola, Calle&nbsp;Fray Luis de Le&oacute;n n&ordm; 1-1&ordm;B,&nbsp; in the heart of the city. We have distributed the levels taking into account the level you have previously indicated us, but the Academic Team will make the appropriate readjustement in order to optimize the learning process of the group. That first day, please bring with you comfortable shoes as we are going to do a two hour sightseeing/orientation tour of Valladolid.</p>
<p>The classes finish at&nbsp; 13.30h. In the middle of the morning&nbsp; you will enjoy a&nbsp; break&nbsp;(from 11:20 to 11:40 H)</p>
<p>In case you have a mobile phone during your stay in Spain, please provide a number for any emergency.</p>
<p>We need some information that you should send us as soon as possible in order to organize your Spanish course:</p>
<p></p>
<h3>LEVEL OF SPANISH</h3>
<p>You are going to do a level test on the first day, in order to organize the groups, but we need to know your level of Spanish:</p>
<ul>
<li>It may already appear in your registration form.</li>
<li>If this entry does not appear in your registration form, send me an e-mail with your level of Spanish. If you do not know your level, you can do the test in the following <a href="http://ave.cervantes.es/prueba_nivel/registro/test_de_clasificacion.php?origen=webAVE">link</a>.</li>
</ul>
<p>&nbsp;</p>
<h3>PAYMENT OF THE SERVICES</h3>
<p><strong>IMPORTANT</strong>: <strong>Payment must be done 10 days prior arrival:</strong><br /><br />&bull; By credit card:<br /><a title="Pagar curso" href="http://www.fundacionlengua.com/en/pagos-fundacion/sec/213/?nombrecompleto={regNombre}&amp;referencia={regId}&amp;concepto=Pago%20pendiente">http://www.fundacionlengua.com/en/pagos-fundacion/sec/213/?nombrecompleto={regNombre}&amp;referencia={regId}&amp;concepto=Pago%20pendiente</a><br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Full name: your name<br />  &nbsp; &nbsp;&nbsp; Amount: the quantity you pay<br />&nbsp;&nbsp;&nbsp;&nbsp;   Reference: your registration number<br />&nbsp;&nbsp;&nbsp;&nbsp;   Item: what you pay<br />&bull; By bank transfer, indicating your registration number:</p>
<p style="margin-left: 30px;"><strong>Banco: CAIXABANK Centro Empresas</strong></p>
<p style="margin-left: 30px;"><strong>Direcci&oacute;n:&nbsp; Calle Regalado, 4</strong>, 47002 Valladolid</p>
<p style="margin-left: 30px;"><strong>C/C:</strong>&nbsp;2100 8543 1613 0036 4423<br /><strong>IBAN:</strong>&nbsp;ES51 2100 8543 1613 0036 4423<br /><strong>BIC/SWIFT:&nbsp;<strong>CAIXESBBXXX</strong></strong></p>
<p>&nbsp;</p>
<h3>HOSTING</h3>
<p>The accommodation, as a rule, begins on Sunday afternoon at 17:00 pm (a day before the beginning of the course) and finishes on Saturday morning at 12:00 am (a day after the ending of the course). If you need to contract extra days, you can do it by notifying it in advance.</p>
<p><br />The details of your accommodation are on the top of the mail.<br />In order to coordinate the issue of accommodation, if you want us to organize it, I need you to tell us:</p>
<ul>
<li>How you will arrive to Valladolid (by train, bus, plane..)</li>
<li>When you will arrive (date and arrival time to Valladolid)</li>
</ul>
<p>Find attached the accommodation <a href="http://www.fundacionlengua.com/en/normas-alojamiento-familia/art/4615/">rules in a family</a>, in case you have selected this option.</p>
<p>&nbsp;</p>
<h3>TRANSPORT - TRANSFER</h3>
<p>If you hire the transfer, please send to us the details of your arrival and departure flight. As soon as possible, we will send to you your bus or train ticket depending on your arrival time to the airport as well as the instructions to get&nbsp; the station from the airport.</p>
<p>We will send details with all the information&nbsp; few days before, because your flight or schedule may change.</p>
<p></p>
<h3>INSURANCE</h3>
<p>If you contract the insurance, we will send to you a copy by email so you will be insured from the beginning of your trip. Consult the conditions on this <a href="http://www.fundacionlengua.com/extra/descargas/des_65/MultiasistenciaCondGenerales-2010.pdf">link</a>.</p>
<p>&nbsp;</p>
<h3>TRIPS</h3>
<p><span>El curso tiene programada una o dos excursiones optativas, con un precio de 50 &euro;, que incluye el viaje en autocar privado y el acompa&ntilde;amiento en la visita con un gu&iacute;a/profesor. La comida y las entradas a los museos no est&aacute;n incluidas. Se puede comer en un restaurante, pero tambi&eacute;n al aire libre (si tienes alojamiento en familia o residencia universitaria te pueden preparar un pic-nic o puedes cambiar la comida por la cena):</span></p>
<p>  Salida a las 9:00 h. y regreso a las 19:00 h (aprox.).</p>
<ul>
<li>Salamanca</li>
<li>Segovia, ...</li>
</ul>
<p>Es necesario inscribirse los dos d&iacute;as primeros de clase y pagar con anticipaci&oacute;n.&nbsp;Es necesario un n&uacute;mero m&iacute;nimo de 12 participantes para realizar la excursi&oacute;n.</p>
<p>&nbsp;</p>
<p>Por favor, no dudes en contactar conmigo si tienes alguna pregunta, por los siguientes medios:</p>
<p>Mail: hola@fundacionlengua.es</p>
<p>T&eacute;fono m&oacute;vil: 0034&nbsp;692 722 751</p>
<p>Tel&eacute;fono fijo: 0034 - 983 15 01 14</p>
<p>&nbsp;</p>
<hr />
<p>Hello,</p>
<p><br />My name is Anabel and from now on, I Iwill be your contact person before and during your stay in Fundaci&oacute;n para la Difusi&oacute;n de la Lengua y Cultura Espa&ntilde;ola. I&acute;d like to inform you about some details before the beginning of&nbsp; your Spanish course in Fundaci&oacute;n.</p>
<h3>SPANISH COURSE</h3>
<p>You want us to help you to learn and improve your Spanish level. That means, it is very important all the organization to be precise. You have to be at the&nbsp;<span>Headquarters</span> of Fundaci&oacute;n:</p>
<ul>
<li><a href="http://www.fundacionlengua.com/en/contactar/sec/46/">With contracted services:&nbsp;9 h.</a></li>
<li><a href="http://www.fundacionlengua.com/en/contactar/sec/46/">Without contracted services: 9:20 h.</a></li>
</ul>
<p>For those who have to pay any contracted service, the period of payment will be opened at&nbsp;9 AM, at the headquarters of the Fundaci&oacute;n, the day of the beginning of the course. For those who do not have to pay fo any service, please come to&nbsp; Fundaci&oacute;n at 9:20 AM.<br />The course begins on Monday at 9:30 AM at the headquarters of the Fundaci&oacute;n de la Lengua Espa&ntilde;ola, Calle&nbsp;Fray Luis de Le&oacute;n n&ordm; 1-1&ordm;B,&nbsp; in the heart of the city. We have distributed the levels taking into account the level you have previously indicated us, but the Academic Team will make the appropriate readjustement in order to optimize the learning process of the group. That first day, please bring with you comfortable shoes as we are going to do a two hour sightseeing/orientation tour of Valladolid.</p>
<p>The classes finish at&nbsp; 13.30h. In the middle of the morning&nbsp; you will enjoy a&nbsp; break&nbsp;(from 11:20 to 11:40 H)</p>
<p>In case you have a mobile phone during your stay in Spain, please provide a number for any emergency.</p>
<p>We need some information that you should send us as soon as possible in order to organize your Spanish course:</p>
<p></p>
<h3>LEVEL OF SPANISH</h3>
<p>You are going to do a level test on the first day, in order to organize the groups, but we need to know your level of Spanish:</p>
<ul>
<li>It may already appear in your registration form.</li>
<li>If this entry does not appear in your registration form, send me an e-mail with your level of Spanish. If you do not know your level, you can do the test in the following <a href="http://ave.cervantes.es/prueba_nivel/registro/test_de_clasificacion.php?origen=webAVE">link</a>.</li>
</ul>
<p>&nbsp;</p>
<h3>PAYMENT OF THE SERVICES</h3>
<p><strong>IMPORTANT</strong>: <strong>Payment must be done 10 days prior arrival:</strong><br /><br />&bull; By credit card:<br /><a title="Pagar curso" href="http://www.fundacionlengua.com/en/pagos-fundacion/sec/213/?nombrecompleto={regNombre}&amp;importe=85&amp;referencia={regId}&amp;concepto=Spanish%20Course">http://www.fundacionlengua.com/en/pagos-fundacion/sec/213/?nombrecompleto={regNombre}&amp;referencia={regId}&amp;concepto=Pago%20pendiente</a><br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Full name: your name<br />  &nbsp; &nbsp;&nbsp; Amount: the quantity you pay<br />&nbsp;&nbsp;&nbsp;&nbsp;   Reference: your registration number<br />&nbsp;&nbsp;&nbsp;&nbsp;   Item: what you pay<br />&bull; By bank transfer, indicating your registration number:</p>
<p style="margin-left: 30px;"><strong>Banco: CAIXABANK Centro Empresas</strong></p>
<p style="margin-left: 30px;"><strong>Direcci&oacute;n:&nbsp; Calle Regalado, 4</strong>, 47002 Valladolid</p>
<p style="margin-left: 30px;"><strong>C/C:</strong>&nbsp;2100 8543 1613 0036 4423<br /><strong>IBAN:</strong>&nbsp;ES51 2100 8543 1613 0036 4423<br /><strong>BIC/SWIFT:&nbsp;<strong>CAIXESBBXXX</strong></strong></p>
<p>&nbsp;</p>
<h3>HOSTING</h3>
<p>The accommodation, as a rule, begins on Sunday afternoon at 17:00 pm (a day before the beginning of the course) and finishes on Saturday morning at 12:00 am (a day after the ending of the course). If you need to contract extra days, you can do it by notifying it in advance.</p>
<p><br />The details of your accommodation are on the top of the mail.<br />In order to coordinate the issue of accommodation, if you want us to organize it, I need you to tell us:</p>
<ul>
<li>How you will arrive to Valladolid (by train, bus, plane..)</li>
<li>When you will arrive (date and arrival time to Valladolid)</li>
</ul>
<p>Find attached the accommodation <a href="http://www.fundacionlengua.com/en/normas-alojamiento-familia/art/4615/">rules in a family</a>, in case you have selected this option.</p>
<p>&nbsp;</p>
<h3>TRANSPORT - TRANSFER</h3>
<p>If you hire the transfer, please send to us the details of your arrival and departure flight. As soon as possible, we will send to you your bus or train ticket depending on your arrival time to the airport as well as the instructions to get&nbsp; the station from the airport.</p>
<p>We will send details with all the information&nbsp; few days before, because your flight or schedule may change.</p>
<p></p>
<h3>INSURANCE</h3>
<p>If you contract the insurance, we will send to you a copy by email so you will be insured from the beginning of your trip. Consult the conditions on this <a href="http://www.fundacionlengua.com/extra/descargas/des_65/MultiasistenciaCondGenerales-2010.pdf">link</a>.</p>
<p>&nbsp;</p>
<h3>TRIPS</h3>
<p><span>El curso tiene programada una o dos excursiones optativas, con un precio de 50 &euro;, que incluye el viaje en autocar privado y el acompa&ntilde;amiento en la visita con un gu&iacute;a/profesor. La comida y las entradas a los museos no est&aacute;n incluidas. Se puede comer en un restaurante, pero tambi&eacute;n al aire libre (si tienes alojamiento en familia o residencia universitaria te pueden preparar un pic-nic o puedes cambiar la comida por la cena):</span></p>
<p>  Salida a las 9:00 h. y regreso a las 19:00 h (aprox.).</p>
<ul>
<li>Salamanca</li>
<li>Segovia, ...</li>
</ul>
<p>Es necesario inscribirse los dos d&iacute;as primeros de clase y pagar con anticipaci&oacute;n.&nbsp;Es necesario un n&uacute;mero m&iacute;nimo de 12 participantes para realizar la excursi&oacute;n.</p>
<p>&nbsp;</p>
<p>Por favor, no dudes en contactar conmigo si tienes alguna pregunta, por los siguientes medios:</p>
<p>Mail: hola@fundacionlengua.es</p>
<p>T&eacute;fono m&oacute;vil: 0034&nbsp;692 722 751</p>
<p>Tel&eacute;fono fijo: 0034 - 983 15 01 14</p>
<p>&nbsp;</p>
<p><strong>{regRegistro}</strong></p>
HTML,
                'entity_type' => 'student',
                'action_identifier' => 'details_info',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Plantilla para enviar los datos del curso de español a un estudiante.',
            ],
            [
                'title' => 'REG',
                'subject' => 'CONFIRMACIÓN DE PAGO E INSCRIPCIÓN',
                'body' => <<<HTML
<p>Recibido el pago de <strong>{regInscripcion}&euro;</strong>&nbsp;/ We have received the payment (<strong>{regInscripcion}&euro;</strong>)</p>
<p><strong>IMPORTANTE</strong> - acceso a &aacute;rea privada (private area): <a href="http://www.fundacionlengua.com/es/area-privada/art/5990/">http://www.fundacionlengua.com/es/area-privada/art/5990/</a></p>
<p>&nbsp;&nbsp;&nbsp; - Id de usuario: <strong>{regId}</strong></p>
<p>&nbsp;&nbsp;&nbsp; - Email de alumno: <strong><strong>{regEmail}</strong></strong></p>
<p><strong><strong>TODAS LAS COMUNICACIONES CON LA FUNDACI&Oacute;N DEBER&Aacute;N SER A TRAV&Eacute;S&nbsp; DEL AREA PRIVADA</strong></strong></p>
<p><strong><strong><span id="result_box" lang="en"><span class="hps">ALL</span> <span class="hps">COMMUNICATIONS</span> <span class="hps">WITH</span> <span class="hps">THE FOUNDATION</span> <span class="hps">SHALL BE</span> <span class="hps">THROUGH</span> <span class="hps">PRIVATE</span> <span class="hps">AREA</span></span></strong></strong></p>
<hr />
<p><strong><br /></strong></p>
<p><strong><strong></strong> </strong>{regRegistro}</p>
HTML,
                'entity_type' => 'student',
                'action_identifier' => 'payment_confirmation',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Plantilla para enviar confirmación de pago e inscripción.',
            ],
            [
                'title' => 'CON & IND 25',
                'subject' => 'Programa BECAS/SCHOLARSHIP 2025',
                'body' => <<<HTML
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
<table border="0" cellpadding="0" cellspacing="0" style="background-color: #f2f2f2; width: 100%;">
<tbody>
<tr>
<td style="padding: 10px 0 30px 0;">
<table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border: 1px solid #cccccc; border-collapse: collapse; width: 600px;">
<tbody>
<tr>
<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"><img src="http://www.fundacionlengua.com/plantillas/images/logos-fundacion-lengua-espanoola.gif" width="538" height="127" alt="" /></td>
</tr>
<tr>
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
<tbody>
<tr>
<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><span>Programa Beca/Scholarship 2025</span></td>
</tr>
<tr>
<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
<p><span><img src="http://www.fundacionlengua.com/plantillas/images/es.png" width="24" height="24" alt="" /></span> D&ordf; Natalia Mart&iacute;n Ramos, en calidad de Directora General de la Fundaci&oacute;n para la Difusi&oacute;n&nbsp;de la Lengua y Cultura Espa&ntilde;ola, sita en Calle Fray Luis de Le&oacute;n 1-1&ordm;B, 47002 Valladolid - Espa&ntilde;a, tiene el placer de informarle que:</p>
<p><strong>CONCEDE</strong></p>
<p>A&nbsp;<strong>{nombreSol}</strong>&nbsp;una beca de estudios asignada por la Fundaci&oacute;n para la Difusi&oacute;n&nbsp;de la Lengua y Cultura Espa&ntilde;ola, para disfrutar gratis de un curso de espa&ntilde;ol de dos semanas en Valladolid durante el a&ntilde;o 2025.</p>
<p><strong>Condiciones de la beca:</strong></p>
<p>Se consideran candidatos a recibir alg&uacute;n tipo de beca de la Fundaci&oacute;n para la Difusi&oacute;n&nbsp;de la Lengua y Cultura Espa&ntilde;ola aquellos estudiantes de espa&ntilde;ol de cualquier parte del mundo excepto Espa&ntilde;a (no se conceder&aacute;n becas a alumnos extranjeros residentes en Espa&ntilde;a).</p>
<p>Dirigida a mayores de 18 a&ntilde;os (consultar condiciones especiales para menores de 18 a&ntilde;os)</p>
<p>Cualquier nivel de espa&ntilde;ol, desde principiante hasta niveles avanzados.</p>
<p>No habr&aacute; discriminaci&oacute;n econ&oacute;mica para la resoluci&oacute;n de concesi&oacute;n.</p>
<p>No habr&aacute; discriminaci&oacute;n acad&eacute;mica para la resoluci&oacute;n de concesi&oacute;n.&nbsp;<br /> Se otorgar&aacute; un n&uacute;mero proporcional de becas por pa&iacute;s.&nbsp;</p>
<p>Este tipo de beca s&oacute;lo podr&aacute; ser otorgada para estudios de espa&ntilde;ol en el centro de la&nbsp;Fundaci&oacute;n para la Difusi&oacute;n&nbsp;de la Lengua y Cultura Espa&ntilde;ola de Valladolid, por un periodo no mayor a dos semanas.</p>
<p>El becado podr&aacute; aumentar el periodo lectivo (superior a dos semanas) asumiendo los gastos del periodo superior a las 2 semanas.</p>
<p>Mostrar un comportamiento ejemplar dentro y fuera (alojamiento, ciudad...) del centro de estudios, cumpliendo plenamente con las actividades propias del centro y del programa de estudios ofertado.</p>
<p>En el caso de no cumplir las citadas normas de conducta, podr&aacute; ser expulsado del programa autom&aacute;ticamente.</p>
<p>La asistencia al curso deber&aacute; ser al menos, del 95%. Las ausencias al curso deber&aacute;n ser en todo caso correctamente justificadas.</p>
<p>La beca consiste en un curso de 2 semanas que incluye clases te&oacute;ricas, pr&aacute;cticas, conversaci&oacute;n y visitas culturales guiadas. El curso es del tipo General 20h. a la semana.</p>
<p>Recibir&aacute;s un correo electr&oacute;nico con los pasos para la correcta inscripci&oacute;n en el programa Becas/Scholarship 2025.</p>
<p>Esperamos que esta beca sea de gran utilidad para que mejores tu idioma espa&ntilde;ol.</p>
<p>Atentamente,&nbsp;</p>
<p>---</p>
<p><img src="http://www.fundacionlengua.com/extra/imagenes/img_76/firma-sello-fundile-natalia.jpg" width="247" height="144" />&nbsp; &nbsp;&nbsp;&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/Acredita-transparente1.png" width="110" height="96" alt="Centro acreditado por el Instituto Cervantes" /></p>
<p>&nbsp;</p>
<hr />
<p>&nbsp;</p>
<p><em><img src="http://www.fundacionlengua.com/plantillas/images/uk.png" width="24" height="24" alt="" /> D&ordf; Natalia Mart&iacute;n Ramos, as General Manager of Fundaci&oacute;n para la Difusi&oacute;n&nbsp;de la Lengua y Cultura Espa&ntilde;ola, located at&nbsp;<span>Calle Fray Luis de Le&oacute;n 1-1&ordm;B, 47002 Valladolid</span>&nbsp;- Espa&ntilde;a, has the pleasure to inform:</em></p>
<p><em><strong>CERTIFIES AND AWARDS</strong></em></p>
<p><em>To&nbsp;<strong>{nombreSol}</strong>, one&nbsp;scholarship&nbsp;awarded by the Fundaci&oacute;n para la Difusi&oacute;n&nbsp;de la Lengua y Cultura Espa&ntilde;ola, to enjoy a free Spanish course, spending two weeks in Valladolid during 2025.</em></p>
<h3><em><strong>Scholarship conditions</strong></em></h3>
<ul>
<li><em>The candidates considered by the Fundaci&oacute;n para la Difusi&oacute;n&nbsp;de la Lengua y Cultura Espa&ntilde;ola to receive any grant will be Spanish language students from all over the world with the exception of Spain (foreign students living in Spain will not be awarded).<br /> <br /> </em></li>
<li><em> It is aimed at students aged 18 years-old (see special conditions for students under 18)<br /> <br /> </em></li>
<li><em> Any level of Spanish, from beginner to advanced levels.<br /> <br /> </em></li>
<li><em> There will be no economic discrimination for the resolution of the scholarship.<br /> <br /> </em></li>
<li><em> There will be no academic discrimination for the resolution of the scholarship.<br /> <br /> </em></li>
<li><em> A proportional number of scholarships will be granted per country.<br /> <br /> </em></li>
<li><em> This type of scholarship can only be granted to study Spanish at the centre of the Fundaci&oacute;n para la Difusi&oacute;n&nbsp;de la Lengua y Cultura Espa&ntilde;ola in Valladolid, for a period not exceeding two weeks.<br /> <br /> </em></li>
<li><em> The students can increase the period of study (over two weeks) assuming the expenses for the period exceeding 2 weeks.<br /> <br /> </em></li>
<li><em> The student will show an exemplary behaviour in and out (accommodation, city ...) of the school, fully complying with the activities of the centre and the offered curriculum .<br /> <br /> </em></li>
<li><em> In case of not meeting the expected behaviour standards, the student may automatically be expelled out of the program.<br /> <br /> </em></li>
<li><em> The attendance to the training course must be at least of the 95%. In any case, the absences will be properly justified <br /> <br /> </em></li>
<li><em>The scholarship consists of a two week course which includes lectures, practical conversation and cultural guided tours. The course is&nbsp;&nbsp;of the type General 20h. a week.</em></li>
</ul>
<p><em>You will receive an email with the steps in order to book the programme Becas/Scholarship 2025.</em></p>
<p><em>We hope that our scholarship helps you to improve your Spanish language.</em></p>
HTML,
                'entity_type' => 'inquiry',
                'action_identifier' => 'scholarship_con_ind_25',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Plantilla para enviar información del Programa de Becas/Scholarship 2025.',
            ],
            [
                'title' => 'COD + INS 25',
                'subject' => 'Programa BECAS/SCHOLARSHIP 2025',
                'body' => <<<HTML
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
<table border="0" cellpadding="0" cellspacing="0" style="background-color: #f2f2f2; width: 100%;">
<tbody>
<tr>
<td style="padding: 10px 0 30px 0;">
<table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border: 1px solid #cccccc; border-collapse: collapse; width: 600px;">
<tbody>
<tr>
<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"><img src="http://www.fundacionlengua.com/plantillas/images/logos-fundacion-lengua-espanoola.gif" width="538" height="127" alt="" /></td>
</tr>
<tr>
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
<tbody>
<tr>
<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><span>C&oacute;digo Beca/Scholarship 2025</span></td>
</tr>
<tr>
<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
<p><span><img src="http://www.fundacionlengua.com/plantillas/images/es.png" width="24" height="24" alt="" /></span> Estimad@&nbsp;<strong>{nombreSol}</strong></p>
<p>Nos ponemos en contacto para remitirte las instrucciones de inscripci&oacute;n en el programa Becas/Scholarship 2024 de la Fundaci&oacute;n para la Difusi&oacute;n&nbsp;de la Lengua y Cultura Espa&ntilde;ola. Esperamos que estas becas sean de gran utilidad para mejorar tus conocimientos de espa&ntilde;ol.</p>
<h2><span style="color: #ff0000;">Scholarship Key/Beca 2025:&nbsp;<span>729015</span></span></h2>
<h2>Instrucciones:</h2>
<ol>
<li>Accede a la web de la Fundaci&oacute;n:&nbsp;<a href="http://www.fundacionlengua.com">www.fundacionlengua.com</a></li>
<li>Busca el banner&nbsp;<img src="https://www.fundacionlengua.com/extra/imagenes/img_81/Becas-2024.jpg" height="78" width="250" />&nbsp;haz click y elige "tengo beca, ya...."&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/tengobeca.jpg" alt="" height="43" width="300" /></li>
<li>Busca el cuadro amarillo,&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/cuadroamarillo.jpg" alt="" height="35" width="100" />&nbsp;elige tus opciones e inscr&iacute;bete reservando tu curso. Recuerda que tu c&oacute;digo Scholarship/Beca es el&nbsp;<span>729015</span></li>
<li>Sigue las instrucciones</li>
</ol>
<p>Esperamos que disfrutes del programa BECAS/SCHOLARSHIP 2024 de la Fundaci&oacute;n para la Difusi&oacute;n&nbsp;de la Lengua y Cultura Espa&ntilde;ola, para alumnos de espa&ntilde;ol de todo el mundo<em>.</em></p>
<p>&nbsp;</p>
<p><img src="http://www.fundacionlengua.com/extra/imagenes/img_76/firma-sello-fundile-natalia.jpg" width="247" height="144" />&nbsp; &nbsp;&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/Acredita-transparente1.png" width="110" height="96" alt="Centro acreditado por el Instituto Cervantes" /></p>
<p></p>
<hr />
<p><em><img src="http://www.fundacionlengua.com/plantillas/images/uk.png" width="24" height="24" alt="" /> <span>Dear&nbsp;<strong>{nombreSol}</strong></span></em></p>
<p><em><span>We contact you in order to send you the instructions for the booking on the Becas/Scholarship 2025. We hope this scholarship will be a help to improve the Spanish language.<br /> </span></em></p>
<h2><span style="color: #ff0000;"><em>Scholarship Key/Beca 2025:&nbsp;<span>729015</span></em></span></h2>
<h2></h2>
<p><em style="font-size: 1.5em;">Instructions:</em></p>
<ol>
<li><em><span>Access the Foundation's website:&nbsp;<a href="http://www.fundacionlengua.com"><span>www.fundacionlengua.com</span></a></span></em></li>
<li><em><span><span lang="en" xml:lang="en">Look for the banner</span>&nbsp;<img src="https://www.fundacionlengua.com/extra/imagenes/img_81/Becas-2024.jpg" height="78" width="250" />&nbsp;<span lang="en" xml:lang="en">&nbsp;click and choose 'I have already...</span>&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/tengobeca.jpg" alt="" height="43" width="300" /></span></em></li>
<li><em><span><span lang="en" xml:lang="en">Look for the yellow box,</span>&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/cuadroamarillo.jpg" alt="" height="35" width="100" />&nbsp;</span></em></li>
<li><em>Choose your options and sign up by booking your course. Remember that your Scholarship/Beca key is the&nbsp;<span>729015</span></em></li>
<li><em><span>Follow the instructions</span></em></li>
</ol>
<p><em><span>&nbsp;We hope you enjoy your Scholarship/Beca 2025 programme with&nbsp;the Fundaci&oacute;n para la Difusi&oacute;n&nbsp;de la Lengua y Cultura Espa&ntilde;ola, for Spanish students all over the world.</span></em></p>
HTML,
                'entity_type' => 'inquiry',
                'action_identifier' => 'scholarship_program_info',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Plantilla para enviar información del Programa de Becas/Scholarship 2025.',
            ],
            [
                'title' => 'CONC\'25',
                'subject' => 'PROGRAMA BECAS/SCHOLARSHIP 2025',
                'body' => <<<HTML
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
<table border="0" cellpadding="0" cellspacing="0" style="background-color: #f2f2f2; width: 100%;">
<tbody>
<tr>
<td style="padding: 10px 0 30px 0;">
<table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border: 1px solid #cccccc; border-collapse: collapse; width: 600px;">
<tbody>
<tr>
<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"><img src="http://www.fundacionlengua.com/plantillas/images/logos-fundacion-lengua-espanoola.gif" width="538" height="127" alt="" /></td>
</tr>
<tr>
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
<tbody>
<tr>
<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><span>Programa&nbsp;</span><span>Beca/Scholarship 2025</span></td>
</tr>
<tr>
<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
<p><span><img src="http://www.fundacionlengua.com/plantillas/images/es.png" width="24" height="24" alt="" /> D&ordf;. Natalia Mart&iacute;n Ramos, en calidad de Directora General de la Fundaci&oacute;n para la Difusi&oacute;n de la Lengua y la Cultura Espa&ntilde;ola, sita en Calle Fray Luis de Le&oacute;n 1-1&ordm;B - 47002 Valladolid - Espa&ntilde;a, tiene el placer de informarle que:</span></p>
<p><span><strong><br /></strong><span><strong style="color: #900;">CONCEDE</strong></span><strong><br /> <br /> </strong></span></p>
<p><span>A su centro de estudios/instituci&oacute;n&nbsp;<span>10 becas</span>&nbsp;de estudio asignadas por la Fundaci&oacute;n, para disfrutar gratis de un curso de espa&ntilde;ol de dos semanas en Valladolid durante el a&ntilde;o 2025</span></p>
<ul>
<li><span>La persona de contacto es<span>&nbsp;</span><strong>{desContacto}</strong><span>&nbsp;</span>y el programa de becas otorgado<span>&nbsp;</span><strong>{desBeca}</strong></span></li>
<li><span>El criterio de selecci&oacute;n de los alumnos pertenece a su centro de estudios/instituci&oacute;n, solicitando que los ganadores de las becas sean enviados en un listado a hola@fundacionlengua.es</span></li>
<li><span>La beca consiste en un curso de 2 semanas que incluye clases te&oacute;ricas y pr&aacute;cticas adem&aacute;s de visitas culturales guiadas<span>.&nbsp;</span><span>El curso es del tipo General 20hs. a la semana.</span></span></li>
</ul>
<p><span>Los pasos para la correcta ejecuci&oacute;n del programa Beca/Scholarship 2025 son:</span></p>
<ol>
<li><span>Elecci&oacute;n de los alumnos premiados</span></li>
<li><span>Env&iacute;o del listado de alumnos premiados a hola@fundacionlengua.es</span></li>
<li><span>Env&iacute;o del correo con el c&oacute;digo de descuento a cada alumno.&nbsp;</span></li>
<li><span>Inscripci&oacute;n individual por parte de cada alumno.</span></li>
</ol>
<p><span><span>En la web podr&aacute;s encontrar una secci&oacute;n de Preguntas Frecuentes FAQ,&nbsp;</span><a href="http://www.fundacionlengua.com/es/faq-preguntas-frecuentes/art/5857/" target="_blank">http://www.fundacionlengua.com/es/faq-preguntas-frecuentes/art/5857/</a><span>&nbsp;que responder&aacute;n a la mayor&iacute;a de las preguntas que suelen formular tanto los profesores como los alumnos becados</span></span></p>
<p><span>Esperamos que estas becas sean de gran utilidad para su instituci&oacute;n y poder ser de ayuda en la difusi&oacute;n del espa&ntilde;ol.</span></p>
<div align="center"><span>&nbsp;---</span><br /> <br /> <img src="http://www.fundacionlengua.com/extra/imagenes/img_76/firma-sello-fundile-natalia.jpg" width="247" height="144" />&nbsp;&nbsp;&nbsp;&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/Acredita-transparente1.png" width="110" height="96" alt="Centro acreditado por el Instituto Cervantes" /></div>
<p></p>
<p><span><img src="http://www.fundacionlengua.com/plantillas/images/uk.png" width="24" height="24" alt="" /> <em>D&ordf;. Natalia Mart&iacute;n Ramos, as General Manager of Fundaci&oacute;n de la Lengua Espa&ntilde;ola, located at <span>Calle Fray Luis de Le&oacute;n 1-1&ordm;B - 47002 Valladolid - Espa&ntilde;a</span>, has the pleasure to inform:</em></span></p>
<p><span><strong><em style="line-height: 24px;">AWARDS</em></strong></span></p>
<p><span>To your study centre/institution 10 scholarships<span>&nbsp;</span><em>awarded by the Fundaci&oacute;n de la Lengua Espa&ntilde;ola, to enjoy a free Spanish course, spending&nbsp; two weeks in Valladolid during 2025</em></span></p>
<ul>
<li><span><em>The contact person is<span>&nbsp;</span><strong>{desContacto}</strong><span>&nbsp;</span>and the Scholarship Programme is<span>&nbsp;</span><strong>{desBeca}</strong></em></span></li>
<li><em><span>The selection of the students depends on the criteria of your school.</span></em></li>
<li><em><span>The scholarship consists of a two week course which includes lectures, practical and cultural guided tours.&nbsp;The course is of the type General 20hs. a week.</span></em></li>
</ul>
<p><em><span>The steps in order to get the programme Becas/Scholarship 2025 are:</span></em></p>
<ol>
<li><em><span>Election of the awarded students</span></em></li>
<li><em><span>Send the list of students awarded to hola@fundacionlengua.es</span></em></li>
<li><i>Send the mail with the code of discount to the students.</i></li>
<li><em><span>Enrollment by students.</span></em></li>
</ol>
<p><em><span>We hope that our scholarships help you to promote the Spanish language in your institution.</span></em></p>
HTML,
                'entity_type' => 'scholarship',
                'action_identifier' => 'interest_confirmation',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Plantilla para enviar confirmación de interés en el Programa de Becas/Scholarship 2025.',
            ],
            [
                'title' => 'CODI\'25',
                'subject' => 'PROGRAMA BECAS/SCHOLARSHIP 2025',
                'body' => <<<HTML
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
<table border="0" cellpadding="0" cellspacing="0" style="background-color: #f2f2f2; width: 100%;">
<tbody>
<tr>
<td style="padding: 10px 0 30px 0;">
<table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border: 1px solid #cccccc; border-collapse: collapse; width: 600px;">
<tbody>
<tr>
<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"><img src="http://www.fundacionlengua.com/plantillas/images/logos-fundacion-lengua-espanoola.gif" width="538" height="127" alt="" /></td>
</tr>
<tr>
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
<tbody>
<tr>
<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><span>Scholarship Key/Beca 2025 - {desClave}</span><span></span></td>
</tr>
<tr>
<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
<p><span><img src="http://www.fundacionlengua.com/plantillas/images/es.png" width="24" height="24" alt="" /> Estimad@&nbsp;<strong>{desContacto}</strong><br /> <br /> Nos ponemos en contacto para remitirte las instrucciones de las becas otorgadas a tu instituci&oacute;n. Esperamos que estas becas sean de gran utilidad para mejorar el espa&ntilde;ol de los ganadores de las mismas. Te rogamos que remitas estas instrucciones de la beca&nbsp;<strong>{desResumen}</strong>&nbsp;a los alumnos para que puedan cumplimentar su inscripci&oacute;n de una forma &aacute;gil, r&aacute;pida y sencilla.<br /> </span></p>
<p><span><span><strong>INSTRUCCIONES</strong></span><strong><br /> </strong></span></p>
<ol>
<li><span>Accede a la web de la Fundaci&oacute;n -&nbsp;&nbsp;<a href="http://www.fundacionlengua.com">www.fundacionlengua.com</a></span></li>
<li><span>Busca el banner&nbsp;<img src="https://www.fundacionlengua.com/extra/imagenes/img_79/Becas-2024.jpg" height="62" width="200" />&nbsp;y doble click y elige "tengo beca, ya...."&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/tengobeca.jpg" height="43" width="300" /><br /> </span></li>
<li><span><span>Busca el cuadro amarillo,&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/cuadroamarillo.jpg" height="51" width="148" />&nbsp;<br /> </span></span></li>
<li><span><span>Elige tus opciones e inscr&iacute;bete reservando tu curso. Recuerda que tu c&oacute;digo Scholarship Key/Beca es el&nbsp;<strong>{desClave}</strong></span></span></li>
<li><span><span><span><span>Sigue las instrucciones<br /> </span></span></span></span></li>
</ol>
<p><span><span>En la web podr&aacute;s encontrar una secci&oacute;n de Preguntas Frecuentes FAQ,&nbsp;</span><a href="http://www.fundacionlengua.com/es/faq-preguntas-frecuentes/art/5857/" target="_blank">http://www.fundacionlengua.com/es/faq-preguntas-frecuentes/art/5857/</a><span>&nbsp;que responder&aacute;n a la mayor&iacute;a de tus preguntas.</span></span></p>
<p><span>Esperamos que estas becas sean de gran utilidad para su instituci&oacute;n y poder ser de ayuda en la difusi&oacute;n del espa&ntilde;ol.</span></p>
<p><span>&nbsp;---</span></p>
<p><span> </span><br /> <img src="http://www.fundacionlengua.com/extra/imagenes/img_76/firma-sello-fundile-natalia.jpg" width="247" height="144" />&nbsp; &nbsp;&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/Acredita-transparente1.png" width="110" height="96" alt="Centro acreditado por el Instituto Cervantes" /></p>
<p></p>
<p><img src="http://www.fundacionlengua.com/plantillas/images/uk.png" width="24" height="24" alt="" /> <em><span>Dear&nbsp;<span><strong>{desContacto},</strong></span></span></em></p>
<p><em><span><br /> </span></em></p>
<p><em><span>We contact you in order to send you the instructions related to the scholarships awarded to your institution. We hope these scholarships are of great help to improve the Spanish of those scholarship winners. We request you to submit the scholarship instructions&nbsp;<span><strong>{desResumen}</strong></span>&nbsp;to students so that they can complete their registration in an agile, fast and easy way.<br /> <br /> .<strong>INSTRUCTIONS</strong></span></em><em><span><strong><br /> </strong></span></em></p>
<ol>
<li><em><span>Access the Foundation&acute;s website: www.fundacionlengua.com</span></em></li>
<li><em><span><span>Look for the banner&nbsp;<img src="https://www.fundacionlengua.com/extra/imagenes/img_79/Becas-2024.jpg" height="78" width="250" />&nbsp;double click and choose "I have already...."&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/tengobeca.jpg" height="29" width="200" /></span></span></em></li>
<li><em><span><span>Look for the yellow box,&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/cuadroamarillo.jpg" height="69" width="200" /></span></span></em></li>
<li><em><span><span>Choose your options and sign up by booking your course. Remember that your Scholarship/Beca key is the&nbsp;<strong>{desClave}</strong></span></span></em></li>
<li><em><span><span>Follow the instructions</span></span></em></li>
</ol>
<p><em><span><span>FAQ,&nbsp;</span><a href="http://www.fundacionlengua.com/es/faq-preguntas-frecuentes/art/5857/" target="_blank">http://www.fundacionlengua.com/es/faq-preguntas-frecuentes/art/5857/</a><span>&nbsp;will answer most of your questios.</span></span></em></p>
<p><em><span>We hope you enjoy your Scholarship/Beca 2025 programme with&nbsp; the Fundaci&oacute;n de la Lengua Espa&ntilde;ola, for Spanish students all over the world.</span></em></p>
<p><span><br /> </span></p>
<p><br /> <strong>{desBeca}</strong>&nbsp;- Nombre asignado para la beca<br /> <strong>{desResumen}</strong>&nbsp;- Centro de estudios / instituci&oacute;n /profesional<br /> <strong>{desClave}</strong>&nbsp;-&nbsp;<br /> <strong>{desContacto}</strong>- Nombre de la persona de contacto&nbsp;<br /> <strong>{desTelefono}</strong>&nbsp;- Tel&eacute;fono del centro becado</p>
HTML,
                'entity_type' => 'scholarship',
                'action_identifier' => 'program_2025',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Plantilla para el programa de becas/scholarship 2025.',
            ],
            [
                'title' => 'REC',
                'subject' => 'INSCRIPCIÓN NO FINALIZADA & RECORDATORIO',
                'body' => <<<HTML
<p><strong>Nombre: {regNombre}</strong></p>
<p><strong><strong>Estudiante ID: {regId}</strong></strong></p>
<p>Queremos recordarle que para finalizar su proceso de registro, debe realizar el pago de la cuota de inscripci&oacute;n.&nbsp; Si no ha realizado el pago de la cuota de inscripci&oacute;n ({regInscripcion}&euro;) le recomendamos realizarlo para poder realizar al reserva de su plaza en las fechas indicadas ya que la reserva no ser&aacute; firme hasta que el proceso de incripci&oacute;n haya sido finalizado.</p>
<p>En el caso de transcurrir un periodo de tiempo largo sin recibir el pago de la inscripci&oacute;n nos veremos obligados a ofrecer su beca a otros estudiantes: debe comprender que hay muchos estudiantes deseando una beca de estudios.</p>
<p>Cualquier otro servicio contratado (alojamiento, seguro, transporte, etc...) , podr&aacute; pagarlo directamente en Espa&ntilde;a al inicio del curso.</p>
<p>El pago podr&aacute; ser realizado en el siguiente link:</p>
<p><a title="Pagar curso" href="http://www.fundacionlengua.com/es/pagos-fundacion/sec/213/?nombrecompleto={regNombre}&amp;importe=85&amp;referencia={regId}&amp;concepto=Spanish%20Course">http://www.fundacionlengua.com/es/pagos-fundacion/sec/213/?nombrecompleto={regNombre}&amp;importe={regInscripcion}&nbsp;&amp;referencia={regId}&amp;concepto=Spanish%20Course</a></p>
<p>En el caso de que ya haya realizado el pago, le pedimos disculpas puesto que este es un mensaje que ha sido generado autom&aacute;ticamente por el sistema. Recuerde igualmente, que puede que haya realizado usted varios intentos de inscripci&oacute;n, y recibir&aacute; un mensaje por cada uno de ellos.</p>
<p>Para cualquier duda puedecontactar con nosotros:</p>
<ul>
<li>email: scholarship@fundacionlengua.es</li>
<li>tel&eacute;fono: 0034 - 983 150 114</li>
</ul>
<p>&iexcl; Esperamos poder vernos pronto en Espa&ntilde;a !</p>
<p><img src="http://www.fundacionlengua.com/extra/imagenes/img_76/firma-sello-fundile-natalia.jpg" width="247" height="144" />&nbsp;&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/Acredita-transparente1.png" width="110" height="96" alt="Centro acreditado por el Instituto Cervantes" /></p>
<p>&nbsp;</p>
<hr />
<p><strong>{regNombre}</strong></p>
<p><strong><strong><strong>ID: {regId}</strong></strong></strong></p>
<p><em>We want to&nbsp;remind you&nbsp;to complete&nbsp;your registration process, you must&nbsp;pay the&nbsp;registration fee.We strongly recommend to do your payment as soon as possible in order to book the exact date you need because your booking is not complete till you finish your registration process<br /></em></p>
<p><em> If you don&acute;t pay the enrollment-booking ({regInscripcion}&euro;) in a few days, we are obliged to give your scholarship to a different student: you have to understand that there are many students asking for the scholarship.</em><br /> <br /><em> In&nbsp;case of&nbsp;any other service&nbsp;contract&nbsp;(housing, insurance,&nbsp;airport&nbsp;transportation, etc ...) may&nbsp;be pay&nbsp;directly to&nbsp;the Foundation&nbsp;as soon as you start the course in Spain.</em><br /> <br /><em> The payment could be done through the next link:</em></p>
<p><a title="Payments Foundation" href="http://www.fundacionlengua.com/en/payments-foundation/sec/213/?nombrecompleto={regNombre}&amp;importe=85&amp;referencia={regId}&amp;concepto=Spanish%20Course"><em>http://www.fundacionlengua.com/en/payments-foundation/sec/213/?nombrecompleto={regNombre}&amp;importe={regInscripcion}&amp;referencia={regId}&amp;concepto=Spanish%20Course</em></a></p>
<p><em>In case you have<em> already </em>done the payment, sorry, this is an automatic message and maybe you have done different enrollments. No problem at all if you already have the &ldquo;CONFIRMACI&Oacute;N DE PAGO e INSCRIPCI&Oacute;N&rdquo; mail.</em></p>
<p><em>Let us know if you have any problem. Thanks.</em></p>
<p><em>In case you have any question:</em></p>
<ul>
<li><em> email: scholarship@fundacionlengua.es</em></li>
<li><em>phone: 0034 - 983 150 114</em></li>
</ul>
<p><em>&nbsp;</em></p>
<p><em>We hope to see you soon in Spain!!!</em></p>
<p><img src="http://www.fundacionlengua.com/extra/imagenes/img_76/firma-sello-fundile-natalia.jpg" width="247" height="144" />&nbsp;&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/Acredita-transparente1.png" width="110" height="96" alt="Centro acreditado por el Instituto Cervantes" /></p>
<p><em><strong><br />{regRegistro}</strong></em></p>
HTML,
                'entity_type' => 'student',
                'action_identifier' => 'payment_reminder',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Plantilla para enviar recordatorio de inscripción y pago.',
            ],
            [
                'title' => 'CER',
                'subject' => 'CERTIFICADO DE ESTUDIOS EN ESPAÑA PARA {regNombre}',
                'body' => <<<HTML
<p style="text-align: center;"><span style="font-size: medium;"><img src="http://www.fundacionlengua.com/extra/imagenes/img_73/logo-fle-nuevo.png" width="250" height="98" /></span></p>
<p></p>
<p style="text-align: center;"><span style="font-size: small;">La Fundaci&oacute;n de la Lengua Espa&ntilde;ola, con CIF G-47723440 y domicilio social en&nbsp;Calle Fray Luis de Le&oacute;n 1-1&ordm;B &ndash; 47002 Valladolid</span></p>
<p style="text-align: center;">&nbsp;<br /><span style="font-size: large;"><strong>CERTIFICA</strong></span></p>
<p>&nbsp;Que D/D&ordf; <strong>{regNombre}</strong> con n&ordm; de pasaporte <strong>{regPasaporte}</strong> est&aacute; inscrito/a en el curso de espa&ntilde;ol que se desarrollar&aacute; en Valladolid en la Sede de la Fundaci&oacute;n de la Lengua Espa&ntilde;ola y que comenzar&aacute; el pr&oacute;ximo <strong>{regComienzo}</strong> del tipo <strong>{regCurso}</strong> y una duraci&oacute;n de <strong>{regSemanas}</strong> semanas siendo el alojamiento en <strong>{regAlojamiento}</strong> gestionado por la propia fundaci&oacute;n en colaboraci&oacute;n con el Ayuntamiento de Valladolid.<br />&nbsp;<br />Este curso ser&aacute; impartido en las instalaciones de la sede de la Fundaci&oacute;n de Lengua Espa&ntilde;ola, sito en&nbsp;Calle Fray Luis de Le&oacute;n 1-1&ordm;B &ndash; 47002 Valladolid</p>
<p style="text-align: center;"><img src="http://www.fundacionlengua.com/extra/imagenes/img_76/firma-sello-fundile-natalia.jpg" width="187" height="109" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/Acredita-transparente1.png" width="80" height="70" alt="Centro acreditado por el Instituto Cervantes" /></p>
<p></p>
<p>Constancia que se expide a petici&oacute;n de la parte interesada, en Valladolid a {regFecha}&nbsp; &nbsp;</p>
<p style="text-align: center;"><span style="font-size: xx-small;"><em>The Fundaci&oacute;n de Lengua Espa&ntilde;ola, CIF number G-47723440 and with its office located at&nbsp;Calle Fray Luis de Le&oacute;n 1-1&ordm;B &ndash; 47002 Valladolid</em></span></p>
<p style="text-align: center;"><span style="font-size: x-small;"><em><strong>CERTIFIES</strong></em></span></p>
<p><span style="font-size: xx-small;"><em>MR/MRS&nbsp;<strong>{regNombre}</strong> with passport number&nbsp;<strong>{regPasaporte}</strong> is currently registered in the Spanish Course to be held in Valladolid in the headquarters of the Fundaci&oacute;n de Lengua Espa&ntilde;ola. The beginning of the course will be the next&nbsp;<strong>{regComienzo}</strong> and type <strong>{regCurso}</strong> with a duration of <strong>{regSemanas} </strong>weeks. The accommodation&nbsp; will be <strong>{regAlojamiento}</strong> and will be managed by the Foundation itself in collaboration with the city of Valladolid.</em></span><br /><br /><span style="font-size: xx-small;"><em>This course is taught at the facilities of the headquarters of the Fundaci&oacute;n de Lengua Espa&ntilde;ola, located at&nbsp;Calle Fray Luis de Le&oacute;n 1-1&ordm;B &ndash; 47002 Valladolid<br /></em></span></p>
<p><span style="font-size: xx-small;"><em>This closing inscription is made for the record, in Valladolid, {regFecha}</em></span></p>
HTML,
                'entity_type' => 'student',
                'action_identifier' => 'certificate',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Plantilla para enviar certificado de estudios.',
            ],
            [
                'title' => 'CON',
                'subject' => 'PROGRAMA BECAS/SCHOLARSHIP - Concesión de beca individual',
                'body' => <<<HTML
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
<table border="0" cellpadding="0" cellspacing="0" style="background-color: #f2f2f2; width: 100%;">
<tbody>
<tr>
<td style="padding: 10px 0 30px 0;">
<table align="center" border="0" cellpadding="0" cellspacing="0" style="background-color: #ffffff; border: 1px solid #cccccc; border-collapse: collapse; width: 600px;">
<tbody>
<tr>
<td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;"><img src="http://www.fundacionlengua.com/plantillas/images/logos-fundacion-lengua-espanoola.gif" width="538" height="127" alt="" /></td>
</tr>
<tr>
<td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
<tbody>
<tr>
<td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;"><strong>{nombreSol} :</strong></td>
</tr>
<tr>
<td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
<p><span><img src="http://www.fundacionlengua.com/plantillas/images/es.png" width="24" height="24" alt="" /><strong> </strong></span>D&ordf;. Natalia Mart&iacute;n Ramos, en calidad de Directora General de la Fundaci&oacute;n de la Lengua Espa&ntilde;ola, sita en&nbsp;Calle Fray Luis de Le&oacute;n n&ordm;1-1&ordm;B - 47002 &ndash; Valladolid - Espa&ntilde;a, tiene el placer de informarle que:</p>
<p><strong>CONCEDE</strong></p>
<p>A&nbsp;<strong>{nombreSol}</strong>&nbsp;una beca de estudios asignada por la Fundaci&oacute;n de la Lengua Espa&ntilde;ola, para disfrutar gratis de un curso de espa&ntilde;ol de dos semanas en Valladolid a lo largo del a&ntilde;o.</p>
<p><strong>Condiciones de la beca: </strong></p>
<ul>
<li>Se consideran candidatos a recibir alg&uacute;n tipo de beca de la Fundaci&oacute;n de la Lengua Espa&ntilde;ola aquellos estudiantes de espa&ntilde;ol de cualquier parte del mundo excepto Espa&ntilde;a (no se conceder&aacute;n becas a alumnos extranjeros residentes en Espa&ntilde;a)</li>
<li>Dirigida a mayores de 18 a&ntilde;os (consultar condiciones especiales para menores de 18 a&ntilde;os)</li>
<li>Cualquier nivel de espa&ntilde;ol, desde principiante hasta niveles avanzados.</li>
<li>No habr&aacute; discriminaci&oacute;n econ&oacute;mica para la resoluci&oacute;n de concesi&oacute;n.</li>
<li>No habr&aacute; discriminaci&oacute;n acad&eacute;mica para la resoluci&oacute;n de concesi&oacute;n.&nbsp;</li>
<li>Se otorgar&aacute; un n&uacute;mero proporcional de becas por pa&iacute;s.&nbsp;</li>
<li>Este tipo de beca s&oacute;lo podr&aacute; ser otorgada para estudios de espa&ntilde;ol en el centro de la Fundaci&oacute;n de la Lengua Espa&ntilde;ola de Valladolid, acreditado por el Instituto Cervantes, por un periodo no mayor a dos semanas.</li>
<li>El becado podr&aacute; aumentar el periodo lectivo (superior a dos semanas) asumiendo los gastos del periodo superior a las 2 semanas.</li>
<li>Mostrar un comportamiento ejemplar dentro y fuera (alojamiento, ciudad...) del centro de estudios, cumpliendo plenamente con las actividades propias del centro y del programa de estudios ofertado.</li>
<li>En el caso de no cumplir las citadas normas de conducta, podr&aacute; ser expulsado del programa autom&aacute;ticamente.</li>
<li>La asistencia al curso deber&aacute; ser al menos, del 95%. Las ausencias al curso deber&aacute;n ser en todo caso correctamente justificadas.</li>
<li>La beca consiste en un curso de 2 semanas que incluye clases te&oacute;ricas, pr&aacute;cticas, conversaci&oacute;n y visitas culturales guiadas, cuyo precio es de 510&euro;.</li>
</ul>
<p>Recibir&aacute;s un correo electr&oacute;nico con los pasos para la correcta inscripci&oacute;n en el programa Becas/Scholarship.</p>
<p>Esperamos que esta beca sea de gran utilidad para que mejores tu idioma espa&ntilde;ol.</p>
<p>&nbsp;Atentamente,&nbsp;</p>
<p>&nbsp;<strong><img src="http://www.fundacionlengua.com/extra/imagenes/img_76/firma-sello-fundile-natalia.jpg" width="247" height="144" />&nbsp; &nbsp;&nbsp;&nbsp;<img src="http://www.fundacionlengua.com/extra/imagenes/img_79/Acredita-transparente1.png" width="110" height="96" alt="Centro acreditado por el Instituto Cervantes" /></strong></p>
<p>&nbsp;</p>
<hr />
<p><em><img src="http://www.fundacionlengua.com/plantillas/images/uk.png" width="24" height="24" alt="" /></em> <em>D&ordf;. Natalia Mart&iacute;n Ramos, as General Manager of Spanish Language Foundation, located at&nbsp;Calle Fray Luis de Le&oacute;n n&ordm;1-1&ordm;B - 47002 &ndash; Valladolid - Espa&ntilde;a, has the pleasure to inform:</em></p>
<p><em><strong>AWARDS</strong></em></p>
<p><em>To&nbsp;<strong>{nombreSol}, one</strong>&nbsp;scholarship&nbsp;awarded by the Spanish Language Foundation, to enjoy a free Spanish course, spending&nbsp; two weeks in Valladolid.</em></p>
<p><em><strong>Scholarship conditions</strong> </em></p>
<ul>
<li><em>The candidates considered by the Fundaci&oacute;n de la Lengua Espa&ntilde;ola to receive any grant will be Spanish language students from all over the world with the exception of Spain (foreign students living in Spain will not be awarded).<br /> <br /> </em></li>
<li><em> It is aimed at students aged 18 years-old (see special conditions for students under 18)<br /> <br /> </em></li>
<li><em> Any level of Spanish, from beginner to advanced levels.<br /> <br /> </em></li>
<li><em> There will be no economic discrimination for the resolution of the scholarship.<br /> <br /> </em></li>
<li><em> There will be no academic discrimination for the resolution of the scholarship.<br /> <br /> </em></li>
<li><em> A proportional number of scholarships will be granted per country.<br /> <br /> </em></li>
<li><em> This type of scholarship can only be granted to study Spanish at the centre of the Fundaci&oacute;n de la Lengua Espa&ntilde;ola in Valladolid, accredited by the Cervantes Institute, for a period not exceeding two weeks.<br /> <br /> </em></li>
<li><em> The students can increase the period of study (over two weeks) assuming the expenses for the period exceeding 2 weeks.<br /> <br /> </em></li>
<li><em> The student will show an exemplary behaviour in and out (accommodation, city ...) of the school, fully complying with the activities of the centre and the offered curriculum .<br /> <br /> </em></li>
<li><em> In case of not meeting the expected behaviour standards, the student may automatically be expelled out of the program.<br /> <br /> </em></li>
<li><em> The attendance to the training course must be at least of the 95%. In any case, the absences will be properly justified<br /> <br /> </em></li>
<li><em>The scholarship consists of a two week&nbsp; course which includes lectures, practical conversation and cultural guided tours, priced at &euro; 510.</em></li>
</ul>
<p><em>You will receive an email with the steps in order to book the programme Becas/Scholarship.</em></p>
<p><em>We hope that our scholarship helps you to promote the Spanish language in your institution.</em></p>
HTML,
                'entity_type' => 'grant',
                'action_identifier' => 'scholarship_con_individual',
                'created_at' => now(),
                'updated_at' => now(),
                'description' => 'Plantilla para enviar la concesión individual de beca del Programa Becas/Scholarship.',
            ],
        ]);

        // Volver a habilitar la comprobación de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Para revertir, se truncará la tabla, lo que eliminará todas las plantillas.
        // Esto es intencional para asegurar que solo las plantillas deseadas estén presentes.
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('email_templates')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
};
