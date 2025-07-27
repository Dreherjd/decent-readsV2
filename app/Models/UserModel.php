<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'users';

    protected $allowedFields = [
        'user_full_name',
        'user_f_name',
        'user_l_name',
        'user_pw',
        'user_un',
        'preferred_pronoun',
        'user_bio',
        'user_location',
    ];

    public function getUserFullNameByUserId(String $userId){
        return $this->select(['user_full_name'])->where(['user_id' => $userId])->first();
    }
    public function getUserByUserId(String $userId){
        return $this->where(['user_id' => $userId])->first();
    }

}