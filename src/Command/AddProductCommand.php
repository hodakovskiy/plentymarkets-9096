<?php

namespace App\Command;

use App\Service\ProductService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class AddProductCommand extends Command
{
    protected static $defaultName = 'add:product';
    protected static $defaultDescription = 'Add product from PlentyMarkets';

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
        parent::__construct();
    }


    protected function configure(): void
    {
        $this
            ->addArgument('itemId', InputArgument::OPTIONAL, 'The ID of the item')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $itemId = $input->getArgument('itemId');


        if (!$itemId) {
            $io->note(sprintf('Not passed an item Id'));
        } else {
          $this->productService->addProductById($itemId);

          $io->success(sprintf('Added product with id %s', $itemId));
        }

        return Command::SUCCESS;
    }
}
