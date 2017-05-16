<?php namespace Ascend\CommandLine;

abstract class _CommandLineAbstract
{
	protected $command;
    protected $name;
	protected $detail;
    
    public function getCommand(){ return $this->command; }
    public function getName(){ return $this->name; }
    public function getDetail(){ return $this->detail; }
    
    abstract public function run();
	
	protected function output($msg) {
		return $msg . RET;
	}
}