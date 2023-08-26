<?php

declare(strict_types=1);

namespace WendellAdriel\Lift\Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Lift\Attributes\Column;
use WendellAdriel\Lift\Attributes\DB;
use WendellAdriel\Lift\Attributes\Fillable;
use WendellAdriel\Lift\Attributes\PrimaryKey;
use WendellAdriel\Lift\Attributes\Rules;
use WendellAdriel\Lift\Lift;

#[DB(table: 'users')]
class UserColumn extends Model
{
    use Lift;

    #[PrimaryKey]
    public int $id;

    #[Rules(['required', 'string'], ['required' => 'The user name cannot be empty'])]
    #[Fillable]
    #[Column(default: 'John Doe')]
    public string $name;

    #[Rules(['required', 'email'])]
    #[Fillable]
    #[Column(name: 'email')]
    public string $user_email;

    #[Rules(['required', 'string', 'min:8'])]
    #[Fillable]
    #[Column(name: 'password', default: 'generatePassword')]
    public string $user_password;

    public function generatePassword(): string
    {
        return 's3Cr3tP4ssw0rd@!!!';
    }
}
