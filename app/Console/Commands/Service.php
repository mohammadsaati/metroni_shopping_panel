<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class Service extends Command
{
    private $file;
    private $base_path = "app/Services/";

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {service} {--category=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create service in app/service';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->file = new Filesystem();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $service_name = $this->argument("service");
        $category_name = $this->option("category");

        $file_content = $this->createFileContent( $service_name  ,$category_name );

        $path = $this->checkDirectory($category_name);


        if (!$this->file->exists($path.$service_name.".php"))
        {
            $this->file->put($path.$service_name.".php" , $file_content);

            $this->info("Service created successfully");
        }
        else {
            $this->warn("This Service already exists");
        }

    }

    private function createFileContent( $class_name , $category )
    {
        $name_space = $category ? "namespace App\Services\\".$category.";" : "namespace App\Services;";

        return "<?php\n\n {$name_space} \n\n use App\Services\Service; \n\n class $class_name extends Service  \n{\n\n \tpublic function model() \n\t{\n\n\t}\n\n }";
    }

    private function checkDirectory( $directory )
    {
        if ( $directory == null )
        {
            return $this->base_path;
        }

        if ( !$this->file->isDirectory($this->base_path.$directory) )
        {
            $this->file->makeDirectory( $this->base_path.$directory );
        }

        return $this->base_path.$directory."/";

    }

}
