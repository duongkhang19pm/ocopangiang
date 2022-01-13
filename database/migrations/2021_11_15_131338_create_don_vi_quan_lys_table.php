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
            #$table->foreignId('tinh_id')->constrained('tinh')->onDelete('cascade');
            #$table->foreignId('huyen_id')->constrained('huyen')->onDelete('cascade');
            $table->foreignId('xa_id')->constrained('xa')->onDelete('cascade');
            $table->string('tenduong');
            $table->string('tendonviquanly');
            $table->string('tendonviquanly_slug');
            $table->string('tenthutruong');
            $table->string('email');
            $table->string('SDT');
            $table->string('website')->nullable();
            $table->string('hinhanh')->nullable();
            $table->text('gioithieu')->nullable();
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
