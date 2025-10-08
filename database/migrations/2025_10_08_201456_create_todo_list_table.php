<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('todo_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('assignee')->nullable();
            $table->timestamp('due_date');
            $table->bigInteger('time_tracked')->default(0);
            $table->enum('status', ['pending', 'open', 'in_progress', 'completed', 'cancelled']);
            $table->enum('priority', ['high', 'medium', 'low'])->nullable();
            $table->timestamps();
        });

        $dbDriver = Schema::getConnection()->getDriverName();

        if ($dbDriver === 'pgsql') {
            DB::statement("DROP TYPE IF EXISTS status_todo_list_enum");
            DB::statement("CREATE TYPE status_todo_list_enum AS ENUM ('pending', 'open', 'in_progress', 'completed', 'cancelled')");
            DB::statement("ALTER TABLE todo_lists ALTER COLUMN status TYPE status_todo_list_enum USING (status::status_todo_list_enum)");
            DB::statement("ALTER TABLE todo_lists ALTER COLUMN status SET DEFAULT 'pending'::status_todo_list_enum");

            DB::statement("DROP TYPE IF EXISTS priority_todo_list_enum");
            DB::statement("CREATE TYPE priority_todo_list_enum AS ENUM ('high', 'medium', 'low')");
            DB::statement("ALTER TABLE todo_lists ALTER COLUMN status TYPE status_todo_list_enum USING (status::status_todo_list_enum)");

            DB::statement("ALTER TABLE todo_lists ALTER COLUMN time_tracked SET DEFAULT 0");
            DB::statement("ALTER TABLE todo_lists ALTER COLUMN time_tracked SET NOT NULL");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_list');
    }
};
