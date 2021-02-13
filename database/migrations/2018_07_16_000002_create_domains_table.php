<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateDomainsTable extends Migration
{
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('domainable_id')->unsigned();
            $table->integer('domainable_type');
        });
    }
    public function down()
    {
        Schema::dropIfExists('domains');
    }
}
