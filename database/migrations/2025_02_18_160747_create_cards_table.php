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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('set_id')->constrained('sets')->onDelete('cascade');
            $table->string('name');
            $table->string('version');
            $table->integer('number');
            $table->string('card_identifier');
            $table->string('image');
            $table->string('thumbnail');
            $table->text('description');
            $table->string('rarity');
            $table->text('story');
            $table->integer('normal_quantity');
            $table->integer('foil_quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
