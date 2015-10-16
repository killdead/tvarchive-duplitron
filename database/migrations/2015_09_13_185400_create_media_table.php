<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {

            // Create fields
            $table->increments('id');
            $table->integer('project_id');
            $table->integer('base_media_id')->nullable();
            $table->text('media_path');
            $table->text('afpt_path');
            $table->text('external_id')->nullable();
            $table->text('start')->default(0);
            $table->text('duration')->default(-1);
            $table->boolean('is_potential_target')->default(false);
            $table->boolean('is_corpus')->default(false);
            $table->boolean('is_distractor')->default(false);
            $table->boolean('is_target')->default(false);
            $table->timestamps();

            // Create indexes
            $table->foreign('project_id')->references('id')->on('projects')
                ->onDelete('cascade');
            $table->foreign('base_media_id')->references('id')->on('media')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('media');
    }
}
