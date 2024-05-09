<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRichTextBoxTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rich_text_box_translations', function (Blueprint $table) {
            // mandatory fields
            $table->id(); // Laravel 5.8+ use bigIncrements() instead of increments()
            $table->string('locale')->index();

            // Foreign key to the main model
            $table->unsignedBigInteger('rich_text_box_id');
            $table->unique(['rich_text_box_id', 'locale']);
            $table->foreign('rich_text_box_id')->references('id')->on('rich_text_boxes')->onDelete('cascade');

            // Actual fields we want to translate
            $table->longText('value')->nullable();

            $table->timestamps();
        });
        DB::statement('ALTER TABLE rich_text_box_translations ADD FULLTEXT idx_full_value(value)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rich_text_box_translations');
    }
}
