<?php 

namespace App\Transformers;

use League\Fractal;
use App\Models\User;
use League\Fractal\TransformerAbstract;

class UsersTransformer extends Fractal\TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'login' => $user->login,
            'email' => $user->email,
        ];
    }
}