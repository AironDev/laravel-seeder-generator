<?php

namespace Airondev\SeederGenerator\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GenerateSeedersCommand extends Command
{
    protected $signature = 'make:seeders';
    protected $description = 'Generate seeders for each database table';

    public function handle()
    {
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        $seederPath = config('seeder-generator.path', database_path('seeders'));

        if (!File::exists($seederPath)) {
            File::makeDirectory($seederPath, 0755, true);
        }

        foreach ($tables as $table) {
            $this->generateSeeder($table, $seederPath);
        }

        $this->info('Seeders generated successfully.');

        return 0;
    }

    protected function generateSeeder($table, $seederPath)
    {
        $className = Str::studly($table) . 'Seeder';
        $filePath = $seederPath . '/' . $className . '.php';

        $columns = DB::getSchemaBuilder()->getColumnListing($table);
        $data = DB::table($table)->get()->toArray();

        $stub = File::get(__DIR__ . '/stubs/seeder.stub');
        $stub = str_replace(['{{className}}', '{{table}}', '{{data}}'], [$className, $table, var_export($data, true)], $stub);

        File::put($filePath, $stub);
    }
}
