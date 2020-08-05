<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Controller\TodoController;

class TodoClearCommand extends Command
{
    protected static $defaultName = "todo:clear";

    protected function configure()
    {
        $this
            ->setDescription("Removes all done todos.")
            ->setHelp("Removes all done todos.")
        ;
    }

    private $todoController;

    public function __construct(TodoController $todoController)
    {
        $this->todoController = $todoController;

        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->todoController->clear();

        $output->writeln("Removed all done todos.");
        return Command::SUCCESS;
    }
}
