<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoySelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boy_selections', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('class');
            $table->string('address');
            $table->string('mainphoto_path');
            $table->string('imgs_path');
            $table->decimal('king_count')->default(0);
            $table->decimal('prince_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boy_selections');
    }
}
