<?php namespace Ascend\CommandLine;

use Ascend\CommandLine\_CommandLineAbstract;
use Ascend\CommandLineArguments;

class AppExample extends _CommandLineAbstract
{

    protected $command = 'app:example';
    protected $name = 'Example of Command Line for App';
    protected $detail = 'Example of Command Line for App';

    public function run()
    {
        $cmdArguments = CommandLineArguments::getArgv();

        $this->outputError('Displays Error!');
        $this->outputSuccess('Display Success');
    }
}