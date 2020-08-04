<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Controller\TodoController;
use Symfony\Component\Console\Helper\Table;

class TodoDisplayCommand extends Command
{
    protected static $defaultName = "todo:display";

    protected function configure()
    {
        $this
            ->setDescription("Displays todos.")
            ->setHelp("Displays todos.")
            ->addOption("all", "a", InputOption::VALUE_NONE, "Displays all todos.")
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

        $all = $input->getOption("all");

        $todos = $this->todoController->display($all);
            
        if ($todos)
        {
            $table = new Table($output);
        
            if ($all)
            {
                $table
                    ->setHeaders(["id", "description", "created", "completed"])
                ;

                foreach ($todos as $todo)
                {
                    $tsCompleted = $todo->getTsCompleted();
                    if ($tsCompleted)
                    {
                        $tsCompleted = $tsCompleted->format("d.m.Y H:m:s");
                    }
    
                    $table
                        ->addRow([$todo->getId(), $todo->getDescription(), $todo->getTsCreated()->format("d.m.Y H:m:s"), $tsCompleted])
                    ;
                }
            }
            else
            {
                $table
                    ->setHeaders(["id", "description", "created"])
                ;

                foreach ($todos as $todo)
                {
                    $table
                        ->addRow([$todo->getId(), $todo->getDescription(), $todo->getTsCreated()->format("d.m.Y H:m:s")])
                    ;
                }
            }
    
            $table->render();
            return Command::SUCCESS;
        }

        $output->writeln("No todos.");
        return Command::FAILURE;
    }
}
