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
        DB::table('email_templates')->insert([
            'title' => 'Factura - Estudiante',
            'subject' => 'Factura - {regNombre}',
            'body' => '<div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;">
    <div style="background-color: #e60000; color: white; padding: 20px; text-align: center;">
        <h1 style="margin: 0;">Fundación Lengua</h1>
        <h2 style="margin: 10px 0 0 0;">FACTURA</h2>
    </div>
    
    <div style="padding: 20px; background-color: #f9f9f9;">
        <h3 style="color: #e60000;">Datos del Estudiante</h3>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <tr>
                <td style="padding: 5px; border-bottom: 1px solid #ddd;"><strong>Nombre:</strong></td>
                <td style="padding: 5px; border-bottom: 1px solid #ddd;">{regNombre}</td>
            </tr>
            <tr>
                <td style="padding: 5px; border-bottom: 1px solid #ddd;"><strong>Email:</strong></td>
                <td style="padding: 5px; border-bottom: 1px solid #ddd;">{regEmail}</td>
            </tr>
            <tr>
                <td style="padding: 5px; border-bottom: 1px solid #ddd;"><strong>Teléfono:</strong></td>
                <td style="padding: 5px; border-bottom: 1px solid #ddd;">{regTelefono}</td>
            </tr>
            <tr>
                <td style="padding: 5px; border-bottom: 1px solid #ddd;"><strong>Pasaporte/DNI:</strong></td>
                <td style="padding: 5px; border-bottom: 1px solid #ddd;">{regPasaporte}</td>
            </tr>
            <tr>
                <td style="padding: 5px; border-bottom: 1px solid #ddd;"><strong>Dirección:</strong></td>
                <td style="padding: 5px; border-bottom: 1px solid #ddd;">{regDireccion}, {regCiudad}, {regProvincia}, {regPais}</td>
            </tr>
        </table>

        <h3 style="color: #e60000;">Estado Contable</h3>
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #e8f4fd;"><strong>Balance Actual:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: right; font-size: 18px; font-weight: bold;">€{currentBalance}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #d4edda;"><strong>Total Pagado:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: right; color: green; font-weight: bold;">€{totalCredits}</td>
            </tr>
            <tr>
                <td style="padding: 10px; border: 1px solid #ddd; background-color: #fff3cd;"><strong>Total Cargos:</strong></td>
                <td style="padding: 10px; border: 1px solid #ddd; text-align: right; color: #856404; font-weight: bold;">€{totalDebits}</td>
            </tr>
        </table>

        <div style="margin-top: 30px; padding: 15px; background-color: white; border-left: 4px solid #e60000;">
            <p style="margin: 0;">Esta es una factura generada automáticamente desde nuestro sistema de gestión contable.</p>
            <p style="margin: 10px 0 0 0;">Para cualquier consulta, contacte con nosotros.</p>
        </div>
    </div>
    
    <div style="background-color: #333; color: white; padding: 15px; text-align: center; font-size: 12px;">
        <p style="margin: 0;">© ' . date('Y') . ' Fundación Lengua. Todos los derechos reservados.</p>
    </div>
</div>',
            'entity_type' => 'student',
            'action_identifier' => 'invoice',
            'description' => 'Plantilla para envío de facturas a estudiantes con estado contable',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('email_templates')->where('action_identifier', 'invoice')->delete();
    }
};
