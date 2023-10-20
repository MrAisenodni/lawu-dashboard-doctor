<?php

namespace App\Models\Settings;

use App\Models\Masters\{
    Gender,
    Position,
    Religion,
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'stg_user';

    public function religion()
    {
        return $this->belongsTo(Religion::class, 'religion_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id')->select('id', 'name')->where('disabled', 0);
    }

    public function login()
    {
        return $this->belongsTo(Login::class, 'id', 'user_id')->select('id', 'user_id', 'username', 'password')->where('disabled', 0);
    }
}
