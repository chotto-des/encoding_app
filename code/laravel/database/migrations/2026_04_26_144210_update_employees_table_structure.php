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
        Schema::table('employees', function (Blueprint $table) {
            // Drop old columns
            if (Schema::hasColumn('employees', 'position')) {
                $table->dropColumn('position');
            }
            if (Schema::hasColumn('employees', 'department')) {
                $table->dropColumn('department');
            }
            if (Schema::hasColumn('employees', 'gender')) {
                $table->dropColumn('gender');
            }
            
            // Add new columns
            if (!Schema::hasColumn('employees', 'date_of_birth')) {
                $table->date('date_of_birth')->nullable();
            }
            if (!Schema::hasColumn('employees', 'contact_number')) {
                $table->string('contact_number')->nullable();
            }
            if (!Schema::hasColumn('employees', 'education_level')) {
                $table->string('education_level')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            // Reverse: drop new columns
            if (Schema::hasColumn('employees', 'date_of_birth')) {
                $table->dropColumn('date_of_birth');
            }
            if (Schema::hasColumn('employees', 'contact_number')) {
                $table->dropColumn('contact_number');
            }
            if (Schema::hasColumn('employees', 'education_level')) {
                $table->dropColumn('education_level');
            }
            
            // Reverse: add back old columns
            if (!Schema::hasColumn('employees', 'position')) {
                $table->string('position')->nullable();
            }
            if (!Schema::hasColumn('employees', 'department')) {
                $table->string('department')->nullable();
            }
            if (!Schema::hasColumn('employees', 'gender')) {
                $table->string('gender')->nullable();
            }
        });
    }
};
