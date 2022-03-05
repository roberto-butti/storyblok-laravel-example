<?php

namespace App\Console\Commands;

use App\Services\StoryblokManagementApiService;
use Illuminate\Console\Command;
use function Termwind\{render};

class ShowComponents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'storyblok:components';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show all components';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        render(<<<'HTML'
    <div>
        <div class="px-1 bg-green-600">Storyblok</div>
        <em class="ml-1">
          Experimental POC for Storyblok CLI
        </em>
    </div>
HTML);
        $api = new StoryblokManagementApiService();
        $components = $api->getComponents();


        foreach ($components->components as $c) {
            render("<dt>📄 " . $c->name . "</dt>");

            $row = "";
            $string = "";
            foreach (get_object_vars($c->schema) as $name => $f) {
                $row .= $name . " (" . $f->type . ") ;";
            }
            $string .= "<dd>✔️ " . $row . "</dd>";
            render("<dl>" . $string . "</dl>");
        }



        return 0;
    }
}
