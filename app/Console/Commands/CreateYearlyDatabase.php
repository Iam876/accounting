<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use App\Helpers\DatabaseSwitcher;

class CreateYearlyDatabase extends Command
{
    protected $signature = 'database:create-yearly {year}';
    protected $description = 'Creates a new yearly database and copies constant table data';

    public function handle()
    {
        $year = $this->argument('year');
        $newDatabaseName = "billing_db_" . $year;

        // Step 1: Create the new database if it doesn't exist
        DB::statement("CREATE DATABASE IF NOT EXISTS $newDatabaseName");

        // Step 2: Switch to the new database
        DatabaseSwitcher::switchToYearlyDatabase($year);

        // Step 3: Run migrations on the new database
        Artisan::call('migrate', [
            '--database' => 'yearly_database',
            '--path' => 'database/migrations', // Ensure this path points to your migration files
        ]);

        // Step 4: Copy data in the correct order
        $tablesToCopy = [
            // Tables without foreign key dependencies should come first
            'package_chooses', 'schools', 'apartments', 'room_tables', 'billing_methods',
            'pic_companies', 'permissions', 'roles', 'users',

            // Tables that depend on the above tables should be copied later
            'model_has_roles', 'model_has_permissions', 'role_has_permissions',

            // Finally, tables with foreign key constraints, such as 'students'
            'students',
        ];

        DB::beginTransaction();

        try {
            foreach ($tablesToCopy as $table) {
                $this->copyTableData($table);
            }

            DB::commit();
            $this->info("Database '$newDatabaseName' created successfully, tables migrated, and constant data copied.");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("An error occurred: " . $e->getMessage());
        }
    }

    /**
     * Copy data from the existing database to the new yearly database.
     *
     * @param string $table
     * @return void
     */
    protected function copyTableData($table)
    {
        // Fetch data from the main database
        $existingData = DB::connection('mysql')->table($table)->get();

        // Insert the data into the new yearly database
        DB::connection('yearly_database')->table($table)->insert(json_decode(json_encode($existingData), true));
    }
}
