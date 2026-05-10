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
        // Eliminar la creación de la tabla, ya que ya existe.
        // Schema::create('email_templates', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });

        \Illuminate\Support\Facades\DB::table('email_templates')->insert([
            'title' => 'REG',
            'subject' => 'CONFIRMACIÓN DE PAGO E INSCRIPCIÓN',
            'body' => '<p>Recibido el pago de <strong>{regInscripcion}&euro;</strong>&nbsp;/ We have received the payment (<strong>{regInscripcion}&euro;</strong>)</p>
<p><strong>IMPORTANTE</strong> - acceso a &aacute;rea privada (private area): <a href="http://www.fundacionlengua.com/es/area-privada/art/5990/">http://www.fundacionlengua.com/es/area-privada/art/5990/</a></p>
<p>&nbsp;&nbsp;&nbsp; - Id de usuario: <strong>{regId}</strong></p>
<p>&nbsp;&nbsp;&nbsp; - Email de alumno: <strong><strong>{regEmail}</strong></strong></p>
<p><strong><strong>TODAS LAS COMUNICACIONES CON LA FUNDACI&Oacute;N DEBER&Aacute;N SER A TRAV&Eacute;S&nbsp; DEL AREA PRIVADA</strong></strong></p>
<p><strong><strong><span id="result_box" lang="en"><span class="hps">ALL</span> <span class="hps">COMMUNICATIONS</span> <span class="hps">WITH</span> <span class="hps">THE FOUNDATION</span> <span class="hps">SHALL BE</span> <span class="hps">THROUGH</span> <span class="hps">PRIVATE</span> <span class="hps">AREA</span></span></strong></strong></p>
<hr />
<p><strong><br /></strong></p>
<p><strong><strong></strong> </strong>{regRegistro}</p>',
            'entity_type' => 'student',
            'action_identifier' => 'payment_confirmation',
            'description' => 'Plantilla para enviar confirmación de pago e inscripción.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Si esta migración no creó la tabla, no debemos intentar borrarla aquí.
        // Schema::dropIfExists('email_templates');
        \Illuminate\Support\Facades\DB::table('email_templates')->where('title', 'REG')->delete();
    }
};
