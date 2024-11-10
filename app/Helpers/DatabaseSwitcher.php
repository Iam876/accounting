<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class DatabaseSwitcher
{
    public static function switchToYearlyDatabase($year)
    {
        $databaseName = $year ? "billing_db_" . $year : env('DB_DATABASE', 'accounting');

        config(['database.connections.yearly_database.database' => $databaseName]);

        \DB::purge('yearly_database');
        \DB::reconnect('yearly_database');
    }

    public static function getAvailableDatabases()
{
    $databases = DB::select("SHOW DATABASES");
    $years = [];

    foreach ($databases as $database) {
        $dbName = $database->Database ?? $database->database ?? null;

        if ($dbName && preg_match('/^billing_db_(\d{4})$/', $dbName, $matches)) {
            $years[] = $matches[1];
        }
    }

    return $years;
}

}



