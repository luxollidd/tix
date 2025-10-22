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
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('id')->primary();

            $table->string('createdBy')->nullable()->index();
            $table->string('createdByName')->nullable();
            $table->string('modifiedBy')->nullable();
            $table->string('modifiedByName')->nullable();

            $table->longText('owner')->nullable();
            $table->longText('web_app_server')->nullable();
            $table->longText('email_cc')->nullable();
            $table->longText('os_hidden_value')->nullable();
            $table->longText('os')->nullable();
            $table->longText('web_app_server_hidden_value')->nullable();
            $table->longText('subject')->nullable();
            $table->longText('project')->nullable();
            $table->longText('pending_type')->nullable();
            $table->longText('priority')->nullable();
            $table->longText('problem_desc')->nullable();
            $table->longText('tags')->nullable();
            $table->longText('issue_type')->nullable();
            $table->longText('db_hidden_value')->nullable();
            $table->longText('database')->nullable();
            $table->longText('ticket_no')->nullable();
            $table->longText('organization_id')->nullable();
            $table->longText('files')->nullable();
            $table->longText('joget_version')->nullable();
            $table->longText('status')->nullable();
            $table->longText('deployment_method_hidden_value')->nullable();
            $table->longText('deployment_method')->nullable();
            $table->longText('email_bcc')->nullable();
            $table->longText('reverse')->nullable();

            // Timestamps matching the model's const CREATED_AT and UPDATED_AT
            $table->dateTime('dateCreated')->nullable()->index();
            $table->dateTime('dateModified')->nullable();
            
            // Adds the `deleted_at` column for soft deletes
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};