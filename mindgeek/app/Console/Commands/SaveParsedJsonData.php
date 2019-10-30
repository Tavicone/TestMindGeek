<?php

namespace App\Console\Commands;

use App\Repositories\MovieRepositoryInterface;
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
    private $movie;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ParseJsonFile $jsonParser, MovieRepositoryInterface $movie)
    {
        parent::__construct();
        $this->jsonParser = $jsonParser;
        $this->movie = $movie;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        $this->jsonParser->setJsonUrl($this->argument('url'));

        $jsonData = $this->jsonParser->getJsonFromUrl();

        foreach ($jsonData as $data) {
            $id = $this->movie->save($data);

            $this->info($id);
        }
    }
}
