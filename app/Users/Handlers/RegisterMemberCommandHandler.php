<?php namespace TGL\Users\Handlers;

use TGL\Users\Entities\User;
use TGL\Users\Repositories\UserRepository;
use TGL\Src\Commander\Interfaces\CommandHandler;

class RegisterMemberCommandHandler implements CommandHandler
{
    /**
     * @var UserRepository
     */
    protected $userRepo;

    function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Handler the command
     *
     * @param $command
     * @return Member
     */
    public function handle($command)
    {
        $member = User::register($command->username, $command->email, $command->full_name, $command->password, $command->slug);

        return $this->userRepo->register($member);
    }
}