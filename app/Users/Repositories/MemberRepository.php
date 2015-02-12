<?php namespace TGL\Users\Repositories;

use Illuminate\Support\Facades\Hash;
use TGL\Core\Repositories\EloquentRepository;
use TGL\Users\Entities\User;
use TGL\Users\Exceptions\UserNotFoundException;

class UserRepository extends EloquentRepository
{

    /**
     * @param User $model
     */
    function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param $user
     * @return User
     */
    public function register($user)
    {
        $this->model->username = $user->username;
        $this->model->slug = $user->slug;
        $this->model->email = $user->email;
        $this->model->full_name = $user->full_name;
        $this->model->password = Hash::make($user->password);

        $this->model->save();

        return $this->model;
    }
}