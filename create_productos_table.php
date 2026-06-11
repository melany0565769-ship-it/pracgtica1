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
        Schema::create('productos', function (Blueprint $table) {
    $table->id(); // [cite: 29]
    $table->string('nombre'); // [cite: 30]
    $table->text('descripcion')->nullable(); // [cite: 31]
    $table->decimal('precio', 10, 2); // [cite: 32]
    $table->integer('stock')->default(0); // [cite: 33]
    $table->timestamps(); // [cite: 34]
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
