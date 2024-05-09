<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTextAreaTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_area_translations', function (Blueprint $table) {
            // mandatory fields
            $table->id(); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('text_area_id');
            $table->unique(['text_area_id', 'locale']);
            $table->foreign('text_area_id')->references('id')->on('text_areas')->onDelete('cascade');

            // Actual fields we want to translate
            $table->text('value')->nullable();

            $table->timestamps();
        });
        DB::statement('ALTER TABLE text_area_translations ADD FULLTEXT idx_full_value(value)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_area_translations');
    }
}
