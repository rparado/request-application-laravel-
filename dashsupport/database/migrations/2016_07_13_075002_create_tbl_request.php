<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_request', function (Blueprint $table) {
            $table->increments('id');
			$table->string('request_no');
           	$table->string('date_requested');
			$table->unsignedInteger('user_id')->nullable();
			$table->unsignedInteger('service_item_id')->nullable();
			$table->string('rate');
			$table->string('priority');
			$table->string('due_date');
			$table->unsignedInteger('dept_id')->nullable();
			$table->string('description');
			$table->string('status');
			$table->string('support_status');
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
        //
    }
}
