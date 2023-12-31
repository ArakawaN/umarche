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
        Schema::create('t_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained() //shopモデルのidしか登録できない様にする
                ->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('type');
            $table->tinyInteger('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_stocks');
    }
};
