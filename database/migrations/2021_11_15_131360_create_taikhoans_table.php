<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TaiKhoan;
class CreateTaiKhoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('tinh_id')->nullable()->constrained('tinh')->onDelete('cascade');
            //$table->foreignId('huyen_id')->nullable()->constrained('huyen')->onDelete('cascade');
            $table->foreignId('xa_id')->nullable()->constrained('xa')->onDelete('cascade');
            $table->foreignId('donviquanly_id')->nullable()->constrained('donviquanly')->onDelete('cascade');
            $table->foreignId('doanhnghiep_id')->nullable()->constrained('doanhnghiep')->onDelete('cascade');
            $table->foreignId('chucvu_id')->nullable()->constrained('chucvu')->onDelete('cascade');
            $table->string('tenduong')->nullable();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('privilege', 20)->default('user'); // admin, donviquanly, doanhnghiep, khachhang
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('hinhanh')->nullable();
            $table->tinyInteger('kichhoat')->default(0);
            $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrentOnUpdate();
            
             $table->engine = 'InnoDB';

        });
      
        TaiKhoan::create([
          
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'dvkhang_19pm@student.agu.edu.vn',
            'phone' => '0328789376',
            'password' => '$2y$10$5FjsSCqTOE2lyb7wAWZsUuY6yL4w2yK8vyzqida48gazHabrSiHj.', // password
            'privilege' => 'admin',
            'kichhoat' =>'0',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taikhoan');
    }
}
