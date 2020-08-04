<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Controller\TodoController;

class TodoRemoveCommand extends Command
{
    protected static $defaultName = "todo:remove";

    protected function configure()
    {
        $this
            ->setDescription("Removes a todo.")
            ->setHelp("Removes a todo.")
            ->addArgument("id", InputArgument::REQUIRED, "Id of the todo.")
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
        $id = $input->getArgument("id");

        $this->todoController->remove($id);

        $output->writeln("Removed todo with id " . $id . ".");
        return Command::SUCCESS;
    }
}
