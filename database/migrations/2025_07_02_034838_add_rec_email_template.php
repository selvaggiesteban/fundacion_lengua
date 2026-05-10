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
            'title' => 'REC',
            'subject' => 'INSCRIPCIÓN NO FINALIZADA & RECORDATORIO',
            'body' => '<p><strong>Nombre: {regNombre}</strong></p>
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
<p><em><strong><br />{regRegistro}</strong></em></p>',
            'entity_type' => 'student',
            'action_identifier' => 'payment_reminder',
            'description' => 'Plantilla para enviar recordatorio de inscripción y pago.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \Illuminate\Support\Facades\DB::table('email_templates')->where('title', 'REC')->delete();
    }
};
