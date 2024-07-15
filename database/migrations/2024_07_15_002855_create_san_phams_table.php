<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham');
            $table->integer('so_luong');
            $table->decimal('gia_san_pham', 10, 2);
            $table->decimal('gia_khuyen_mai', 10, 2);
            $table->date('ngay_nhap');
            $table->text('mo_ta');
            $table->boolean('trang_thai');
            $table->foreignId('danh_muc_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
