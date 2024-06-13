<?php

namespace Airondev\SeederGenerator\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateSeedersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:seeders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate seeders for each database table';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        foreach ($tables as $table) {
            $this->generateSeeder($table);
        }

        $this->info('Seeders generated successfully.');

        return 0;
    }

    protected function generateSeeder($table)
    {
        $className = Str::studly($table) . 'Seeder';
        $filePath = database_path("seeders/{$className}.php");

        $columns = DB::getSchemaBuilder()->getColumnListing($table);
        $data = DB::table($table)->get()->toArray();

        $stub = File::get(__DIR__ . '/stubs/seeder.stub');
        $stub = str_replace(['{{className}}', '{{table}}', '{{data}}'], [$className, $table, var_export($data, true)], $stub);

        File::put($filePath, $stub);
    }
}
