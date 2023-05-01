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
        Schema::create('room', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->id();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('name', 250);
            $table->string('city', 250);
            $table->string('area', 250);
            $table->string('photo_url', 250);
            $table->integer('count_of_guests');
            $table->integer('price');
            $table->string('address', 250);
            $table->decimal('location_lat', 10, 7);
            $table->decimal('location_long', 10, 7);
            $table->string('description_short', 250);
            $table->text('description_long');
            $table->tinyInteger('parking');
            $table->tinyInteger('wifi');
            $table->tinyInteger('pet_friendly');
            $table->decimal('avg_reviews', 10, 7)->nullable();
            $table->integer('count_reviews')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->foreign('type_id')
                ->references('id')
                ->on('room_type')
                ->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room');
    }
};
