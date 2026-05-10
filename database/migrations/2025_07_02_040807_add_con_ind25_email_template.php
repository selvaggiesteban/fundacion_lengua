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
<td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;" width="75%">&reg; Fundaci&oacute;n de la Lengua Espa&ntilde;ola 2023<br /> <a href="http://www.fundacionlengua.com/" style="color: #ffffff;"><span color="#ffffff" style="color: #ffffff;">www.fundacionlengua.com</span></a></td>
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
            'entity_type' => 'inquiry',
            'action_identifier' => 'scholarship_con_ind_25',
            'description' => 'Plantilla para enviar información del Programa de Becas/Scholarship 2025.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \Illuminate\Support\Facades\DB::table('email_templates')->where('title', 'CON & IND 25')->delete();
    }
};
