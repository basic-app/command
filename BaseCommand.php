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
    }

    public function preparePath(string $path) : string
    {
        if (DIRECTORY_SEPARATOR == "\\")
        {
            return str_replace("/", "\\", $path);
        }
        else
        {
            return str_replace("\\", "/", $path);
        }
    }

    public function rootPath(string $path) : string
    {
        return ROOTPATH . $this->preparePath($path);
    }

    public function appPath(string $path) : string
    {
        return APPPATH . $this->preparePath($path);
    }

    public function systemPath(string $path) : string
    {
        return SYSTEMPATH . $this->preparePath($path);
    }

    public function fcPath(string $path) : string
    {
        return FCPATH . $this->preparePath($path);
    }

    public function writePath(string $path) : string
    {
        return WRITEPATH . $this->preparePath($path);
    }

}