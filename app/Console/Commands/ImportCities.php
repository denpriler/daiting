<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Guest\Entities\City;

class ImportCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:city {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import cities from CSV file.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $path = $this->argument('path') ?? base_path('resources/csv/cities.csv');

        if (!file_exists($path)) {
            $this->error("File does not exists at path $path");
            return Command::FAILURE;
        }

        $count = count(file($path));

        $bar = $this->output->createProgressBar($count);
        $bar->start();

        $file_handle = fopen($path, 'r');

        // Read first header line
        fgetcsv($file_handle, 0);
        while (!feof($file_handle)) {
            try {
                $data = array_combine(
                    ['level_1', 'level_2', 'level_3', 'level_4', 'object_category', 'object_name', 'object_code', 'region', 'community'],
                    fgetcsv($file_handle, 0)
                );
                $city = City::firstOrNew([
                    'object_code' => $data['object_code']
                ]);
                $city->setTranslation('title', 'ru', mb_convert_case(mb_strtolower($data['object_name']), MB_CASE_TITLE));
                $city->save();
            } catch (\Exception) {
            }
            $bar->advance();
        }
        fclose($file_handle);

        $bar->finish();

        return Command::SUCCESS;
    }
}
