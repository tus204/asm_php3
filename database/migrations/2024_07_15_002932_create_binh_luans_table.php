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
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('san_pham_id')->constrained()->onDelete('cascade');
            $table->foreignId('tai_khoan_id')->constrained()->onDelete('cascade');
            $table->text('noi_dung');
            $table->dateTime('thoi_gian');
            $table->boolean('trang_thai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luans');
    }
};
