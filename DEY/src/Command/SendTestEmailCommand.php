<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

// #[AsCommand(
//     name: 'SendTestEmailCommand',
//     description: 'Add a short description for your command',
// )]
// class SendTestEmailCommand extends Command
// {
//     public function __construct()
//     {
//         parent::__construct();
//     }

//     protected function configure(): void
//     {
//         $this
//             ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
//             ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
//         ;
//     }

//     protected function execute(InputInterface $input, OutputInterface $output): int
//     {
//         $io = new SymfonyStyle($input, $output);
//         $arg1 = $input->getArgument('arg1');

//         if ($arg1) {
//             $io->note(sprintf('You passed an argument: %s', $arg1));
//         }

//         if ($input->getOption('option1')) {
//             // ...
//         }

//         $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

//         return Command::SUCCESS;
//     }
// }

#[AsCommand(
    name: 'app:send-test-email',
    description: 'Sends a test email.'
)]
class SendTestEmailCommand extends Command
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Sends a test email.')
            ->setHelp('This command allows you to send a test email...');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $email = (new Email())
            ->from('sender@example.com')  // Remplacez par votre adresse d'envoi
            ->to('recipient@example.com') // Remplacez par l'adresse du destinataire
            ->subject('Test Email from Symfony Command')
            ->text('This is a test email sent from a Symfony command.')
            ->html('<p>This is a test email sent from a Symfony command.</p>');

        $this->mailer->send($email);

        $io->success('Test email sent successfully.');

        return Command::SUCCESS;
    }
}