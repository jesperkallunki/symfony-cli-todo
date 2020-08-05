<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Controller\TodoController;

class TodoDoneCommand extends Command
{
    protected static $defaultName = "todo:done";

    protected function configure()
    {
        $this
            ->setDescription("Marks a todo as done.")
            ->setHelp("Marks a todo as done.")
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

        $this->todoController->done($id);

        $output->writeln("Marked todo with id " . $id . " as done.");
        return Command::SUCCESS;
    }
}
