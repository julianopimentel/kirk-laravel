<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Users_Account_Aud extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table = 'users_account_aud';
    public $timestamps = false;
    /**
     * Get the notes for the status.
     */
        //Primary Key da Tabela.
        protected $primaryKey = 'id';

        //Item em um Array que são utilizados
        //para preenchimento da informação.
        protected $fillable   = ['id', 'user_id','account_id', 'people_id', 'created_at'];

        protected $casts = [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
}
