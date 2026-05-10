    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('graduate_images', function (Blueprint $table) {
                $table->id();
                $table->foreignId('graduate_id')->constrained()->onDelete('cascade');
                $table->string('image_path');
                $table->string('caption')->nullable();
                $table->timestamps();
            });
        }
        
        public function down(): void
        {
            Schema::dropIfExists('graduate_images');
        }
    };
    