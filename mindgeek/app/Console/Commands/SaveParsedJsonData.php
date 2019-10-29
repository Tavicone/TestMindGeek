<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ParseJsonFile;
use JsonMachine\JsonMachine;

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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        $this->jsonParser->setJsonUrl($this->argument('url'));

        $jsonData = $this->jsonParser->getJsonFromUrl();

        foreach (JsonMachine::fromStream($jsonData) as $key => $value) {
//            var_dump([$key, $value]);
            $this->info($value);

            die();
        }

//        $this->info($zzz);
    }
}
