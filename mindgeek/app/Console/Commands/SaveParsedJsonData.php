<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ParseJsonFile;

class SaveParsedJsonData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parsedJsonData:save {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save data into DB from parsed json file';

    protected $jsonParser;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ParseJsonFile $jsonParser)
    {
        parent::__construct();
        $this->jsonParser = $jsonParser;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->jsonParser->setJsonUrl($this->argument('url'));

        $zzz = $this->jsonParser->saveJsonData();

        $this->info($zzz);
    }
}
