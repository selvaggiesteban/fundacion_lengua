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
            'action_identifier' => 'scholarship_program_info',
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
        \Illuminate\Support\Facades\DB::table('email_templates')->where('title', 'COD + INS 25')->delete();
    }
};
