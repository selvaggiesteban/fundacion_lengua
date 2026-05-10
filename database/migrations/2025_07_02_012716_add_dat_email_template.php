<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        \Illuminate\Support\Facades\DB::table('email_templates')->insert([
            'title' => 'DAT',
            'subject' => 'DATOS DEL CURSO DE ESPAÑOL',
            'body' => '<p>Los datos de tu alojamiento son:</p>
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
<p><span>There is also one or two optional trips, at a price of 50 &euro;, which includes the journey and the guided visit. Lunch and&nbsp; tickets for&nbsp; Museums are not inluded. In summer/spring, you can have lunch in a restaurant but also outdoors (in case you live with a family, you can bring a pic-nic or you also have the choice to switch lunch by dinner).</span></p>
<p>Departure at 9:00 AM and return at 19:00 PM (aprox.).</p>
<ul>
<li>Salamanca</li>
<li>Segovia, ...</li>
</ul>
<p>It is necessary to book and pay the trip during the first two days of the course.</p>
<p><br />Please, do not hesitate to contact me if you have any question:</p>
<p>Mail: hola@fundacionlengua.es</p>
<p>T&eacute;fono m&oacute;vil: 0034&nbsp;692 722 751</p>
<p>Tel&eacute;fono fijo: 0034 - 983 15 01 14</p>
<p>&nbsp;</p>
<p><strong>{regRegistro}</strong></p>',
            'entity_type' => 'student',
            'action_identifier' => 'details_info',
            'description' => 'Plantilla para enviar los datos del curso de español a un estudiante.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \Illuminate\Support\Facades\DB::table('email_templates')->where('title', 'DAT')->delete();
    }
};
