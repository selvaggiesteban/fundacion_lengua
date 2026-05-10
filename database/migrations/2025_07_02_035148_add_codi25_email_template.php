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
            'title' => 'CODI\'25',
            'subject' => 'PROGRAMA BECAS/SCHOLARSHIP 2025',
            'body' => '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
<tbody>
<tr>
<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">&reg; Fundaci&oacute;n de la Lengua Espa&ntilde;ola<br /> <a href="http://www.fundacionlengua.com/" style="color: #ffffff;"><span color="#ffffff" style="color: #ffffff;">www.fundacionlengua.com</span></a></td>
<td align="right" width="25%">
<table border="0" cellpadding="0" cellspacing="0">
<tbody>
<tr>
<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;"><a href="https://twitter.com/fundacionlengua" style="color: #ffffff;"> <img src="http://www.fundacionlengua.com/plantillas/images/tw.gif" alt="Twitter" width="38" height="38" style="display: block;" border="0" /> </a></td>
<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;"><a href="https://www.facebook.com/fundacion.lengua.espanola" style="color: #ffffff;"> <img src="http://www.fundacionlengua.com/plantillas/images/fb.gif" alt="Facebook" width="38" height="38" style="display: block;" border="0" /> </a></td>
<td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
<td style="font-family: Arial, sans-serif; font-size: 12px; font-weight: bold;"><a href="https://www.youtube.com/user/fundacionlengua" style="color: #ffffff;"> <img src="http://www.fundacionlengua.com/plantillas/images/yt.gif" alt="Youtube" width="38" height="38" style="display: block;" border="0" /> </a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>',
            'entity_type' => 'scholarship',
            'action_identifier' => 'program_2025',
            'description' => 'Plantilla para el programa de becas/scholarship 2025.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \Illuminate\Support\Facades\DB::table('email_templates')->where('title', 'CODI\'25')->delete();
    }
};
