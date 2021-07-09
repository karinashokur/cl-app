<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateDateTable extends Migration
{
    public function up()
    {
        Schema::create('date', function (Blueprint $table)
        {
            $table->increments('id');
            $table->date('start_date');
            $table->date('expected_end_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('date');
    }
}
