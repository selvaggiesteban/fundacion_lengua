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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // Clave foránea al usuario que realizó el pedido
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('order_number')->unique(); // Número de pedido, único
            $table->dateTime('order_date'); // Fecha y hora del pedido
            $table->decimal('total_amount', 10, 2); // Cantidad total del pedido (ej. 99999999.99)
            $table->string('status')->default('pendiente'); // Estado del pedido
            $table->string('payment_method')->nullable(); // Método de pago (puede ser nulo si no se ha definido aún)
            $table->text('description')->nullable(); // Descripción del pedido (opcional)

            // Nuevas columnas de Tipo de Curso
            $table->string('course_type')->nullable();
            $table->string('accommodation')->nullable(); // String simple, no FK por ahora
            $table->integer('weeks')->nullable();
            $table->date('start_date')->nullable();
            $table->boolean('insurance')->nullable();
            $table->boolean('transport')->nullable();
            $table->boolean('parking_available')->nullable();
            $table->boolean('cancellation_policy')->nullable(); // Cambio a 'cancellation_policy' como boolean
            $table->boolean('university_certificate_ects')->nullable();
            $table->string('destination')->nullable();
            $table->string('discount_code')->nullable(); // String simple, validación de asociación se haría en lógica de negocio

            // Nuevas columnas de Datos Personales
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('language')->nullable();
            $table->string('second_language')->nullable(); // Puede ser nulo
            $table->string('spanish_level')->nullable();
            $table->string('study_center_name')->nullable(); // Puede ser nulo
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('smoking_preference')->nullable();
            $table->boolean('pets_preference')->nullable();
            $table->text('notes')->nullable(); // Tipo text para notas largas

            $table->timestamps(); // Campos created_at y updated_at
            $table->softDeletes(); // Para soft deletes (eliminación suave)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
