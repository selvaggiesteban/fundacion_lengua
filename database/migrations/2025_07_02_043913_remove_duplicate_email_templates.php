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
        DB::table('email_templates')
            ->whereNotIn('id', function ($query) {
                $query->select(DB::raw('MIN(id)'))
                      ->from('email_templates')
                      ->groupBy('title', 'subject', 'body');
            })
            ->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No hay una operación de reversión directa para la eliminación de duplicados,
        // ya que requeriría reinsertar las entradas exactas que se eliminaron,
        // lo cual no es práctico en una migración de rollback simple.
    }
};
