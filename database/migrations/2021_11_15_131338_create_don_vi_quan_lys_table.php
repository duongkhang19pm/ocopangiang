<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonViQuanLysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donviquanly', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tinh_id')->constrained('tinh');
            $table->foreignId('huyen_id')->constrained('huyen');
            $table->foreignId('xa_id')->constrained('xa');
            $table->string('tenduong');
            $table->string('tendonviquanly');
            $table->string('tendonviquanly_slug');
            $table->string('tenthutruong');
            $table->string('email');
            $table->string('SDT');
             $table->string('hinhanh')->nullable();
            $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
             $table->engine = 'InnoDB';
        });;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donviquanly');
    }
}
