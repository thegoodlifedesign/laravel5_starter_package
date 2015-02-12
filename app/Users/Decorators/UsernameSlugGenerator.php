<?php namespace TGL\Users\Decorators;

use TGL\Tools\Slugger\Slugger;
use TGL\Src\Commander\Interfaces\CommandBus;

class UsernameSlugGenerator implements CommandBus
{
    use Slugger;

    /**
     * Execute a command
     *
     * @param $command
     * @return mixed
     */
    public function execute($command)
    {
        $command->slug = $this->slugify($command->username);
    }
}