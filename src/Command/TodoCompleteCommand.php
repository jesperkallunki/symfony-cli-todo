<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Controller\TodoController;

class TodoCompleteCommand extends Command
{
    protected static $defaultName = "complete";

    protected function configure()
    {
        $this
            ->setDescription("Completes a todo.")
            ->setHelp("Completes a todo.")
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

        if ($id)
        {
            if ($this->todoController->complete($id))
            {
                $output->writeln("Completed todo with id " . $id . ".");
                return Command::SUCCESS;
            }
            
            $output->writeln("No todo with id " . $id . ".");
            return Command::FAILURE;
        }

        $output->writeln("Please provide todo id.");
        return Command::FAILURE;
    }
}
