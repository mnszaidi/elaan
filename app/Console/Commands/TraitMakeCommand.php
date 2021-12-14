<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TraitMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {name : Class (singular), e.g User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new trait';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $this->trait($name);

        $this->info('Trait Created successfully!');
    }
    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Trait';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        //return __DIR__ . '/stubs/trait.stub';
        return file_get_contents(resource_path("stubs/crud/trait.stub"));
    }


    /**
     * [Create Controller File to Controllers Folder]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function trait($name)
    {

    $TraitTemplate = str_replace(
        [
            '{{modelName}}', 
            '{{modelNamePluralLowerCase}}',
            '{{modelNameSingularLowerCase}}',
            '{{modelNamePluralUcFirst}}'
        ],
        [
            $name,
            strtolower(str_plural($name)),
            strtolower($name),
            ucfirst(str_plural($name))
        ],
        $this->getStub('Trait')
    );

    $trait = ucfirst($name);

    if(!file_exists($path = app_path('/Traits/')))
        mkdir($path, 0777, true);

    file_put_contents(app_path("/Traits/{$trait}.php"), $TraitTemplate);

    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Traits';
    }

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

}
