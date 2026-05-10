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
<p><em>We hope that our scholarship helps you to improve your Spanish language.</em></p>
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
<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">&reg; Fundaci&oacute;n de la Lengua Espa&ntilde;ola 2018<br /> <a href="http://www.fundacionlengua.com/" style="color: #ffffff;"><span color="#ffffff" style="color: #ffffff;">www.fundacionlengua.com</span></a></td>
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
</table>
HTML,
            'entity_type' => 'grant',
            'action_identifier' => 'scholarship_con_individual',
            'description' => 'Plantilla para enviar la concesión individual de beca del Programa Becas/Scholarship.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \Illuminate\Support\Facades\DB::table('email_templates')->where('title', 'CON')->delete();
    }
};
