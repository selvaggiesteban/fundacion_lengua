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
            'title' => 'CER',
            'subject' => 'CERTIFICADO DE ESTUDIOS EN ESPAÑA PARA {regNombre}',
            'body' => '<p style="text-align: center;"><span style="font-size: medium;"><img src="http://www.fundacionlengua.com/extra/imagenes/img_73/logo-fle-nuevo.png" width="250" height="98" /></span></p>
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
<p><span style="font-size: xx-small;"><em>This closing inscription is made for the record, in Valladolid, {regFecha}</em></span></p>',
            'entity_type' => 'student',
            'action_identifier' => 'certificate',
            'description' => 'Plantilla para enviar certificado de estudios.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \Illuminate\Support\Facades\DB::table('email_templates')->where('title', 'CER')->delete();
    }
};
