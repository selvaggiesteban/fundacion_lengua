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
            'title' => 'CONC\'25',
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
            'action_identifier' => 'interest_confirmation',
            'description' => 'Plantilla para enviar confirmación de interés en el Programa de Becas/Scholarship 2025.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \Illuminate\Support\Facades\DB::table('email_templates')->where('title', 'CONC\'25')->delete();
    }
};
