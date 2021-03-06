<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateBillingsTable extends Migration
{
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_phone');
            $table->string('company_email');
            $table->integer('company_siret');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_siret');
            $table->string('total_price');
            $table->string('total_budget');
            $table->string('billing_date');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('facturations');
    }
}
