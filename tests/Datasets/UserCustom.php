<?php

declare(strict_types=1);

namespace WendellAdriel\Lift\Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Lift\Attributes\PrimaryKey;
use WendellAdriel\Lift\Attributes\Rules;
use WendellAdriel\Lift\Lift;

class UserCustom extends Model
{
    use Lift;

    #[PrimaryKey(incrementing: false)]
    public int $id;

    #[Rules(['required', 'string'], ['required' => 'The user name cannot be empty'])]
    public string $name;

    #[Rules(['required', 'email'])]
    public string $email;

    #[Rules(['required', 'string', 'min:8'])]
    public string $password;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
