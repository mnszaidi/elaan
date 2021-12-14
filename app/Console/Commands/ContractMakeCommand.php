<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ContractMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:contract {name : Class (singular), e.g User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Contract/Interace';

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
        $name = $this->argument('name');
        $this->contract($name);
        $this->info('Contract Created successfully!');
    }

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Contract';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return file_get_contents(resource_path("stubs/crud/Contract.stub"));
    }


    /**
     * [Create Controller File to Controllers Folder]
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    protected function contract($name)
    {

    $ContractTemplate = str_replace(
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
        
        $this->getStub('Contract')
    );

    $contract = ucfirst($name);

    if(!file_exists($path = app_path('/Contracts/')))
        mkdir($path, 0777, true);

    file_put_contents(app_path("/Contracts/{$contract}.php"), $ContractTemplate);

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
        return $rootNamespace . 'Contracts';
    }


}
