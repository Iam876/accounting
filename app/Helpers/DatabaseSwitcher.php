<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class DatabaseSwitcher
{
    /**
     * Switch to a database for a specified year or revert to the default.
     *
     * @param string|null $year The year to switch the database, or null for default.
     */
    public static function switchToYearlyDatabase($year)
    {
        // Set the database name based on the year
        $databaseName = $year ? "billing_db_" . $year : env('DB_DATABASE', 'accounting');

        // Update configuration for the `yearly_database` connection
        config(['database.connections.yearly_database.database' => $databaseName]);

        // Set `yearly_database` as the default connection for this request
        config(['database.default' => 'yearly_database']);

        // Purge and reconnect to ensure the new configuration is applied immediately
        DB::purge('yearly_database');
        DB::reconnect('yearly_database');
    }

    /**
     * Get a list of available yearly databases by matching naming patterns.
     *
     * @return array List of years for which databases are available.
     */
    public static function getAvailableDatabases()
    {
        $databases = DB::select("SHOW DATABASES");
        $years = [];

        foreach ($databases as $database) {
            // Retrieve the database name from the query result
            $dbName = $database->Database ?? $database->database ?? null;

            // Match naming pattern for yearly databases (e.g., "billing_db_2024")
            if ($dbName && preg_match('/^billing_db_(\d{4})$/', $dbName, $matches)) {
                $years[] = $matches[1];
            }
        }

        return $years;
    }
}
