<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link https://basic-app.com
 */
namespace BasicApp\Command;

use Psr\Log\LoggerInterface;
use CodeIgniter\CLI\Commands;

abstract class BaseCommand extends \CodeIgniter\CLI\BaseCommand
{

    protected $autoFlush = true;

    protected $request;

    /**
     * Command constructor.
     *
     * @param \Psr\Log\LoggerInterface       $logger
     * @param \CodeIgniter\CLI\CommandRunner $commands
     */
    public function __construct(LoggerInterface $logger, Commands $commands)
    {
        parent::__construct($logger, $commands);

        if ($this->autoFlush)
        {
            while (ob_get_level() > 0)
            {
                ob_end_flush();
            }
        }

        $this->request = service('cliRequest');
    }

}