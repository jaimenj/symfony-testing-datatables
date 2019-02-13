<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Entity\SampleData;

class GenerateSampleDataCommand extends Command
{
    protected static $defaultName = 'app:generate-sample-data';
    private $container;

    public function __construct(ContainerInterface $container)
    {
        parent::__construct();
        $this->container = $container;
    }

    protected function configure()
    {
        $this
            ->setDescription('Command for generating sample data.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $entityManager = $this->container->get('doctrine')->getManager();

        for ($i = 0; $i < 1000000; ++$i) {
            $sampleData = new SampleData();

            $sampleData->setcol1('Datos '.$i.' 1');
            $sampleData->setcol2('Datos '.$i.' 2');
            $sampleData->setcol3('Datos '.$i.' 3');
            $sampleData->setcol4('Datos '.$i.' 4');
            $sampleData->setcol5('Datos '.$i.' 5');
            $sampleData->setcol6('Datos '.$i.' 6');
            $sampleData->setcol7('Datos '.$i.' 7');
            $sampleData->setcol8('Datos '.$i.' 8');
            $sampleData->setcol9('Datos '.$i.' 9');
            $sampleData->setcol10('Datos '.$i.' 10');

            $entityManager->persist($sampleData);

            // Sólo hacemos flush a la BD cada 1000 filas
            if (0 == $i % 1000) {
                $entityManager->flush();
            }
        }

        $io->success('All sample data generated!');
    }
}
