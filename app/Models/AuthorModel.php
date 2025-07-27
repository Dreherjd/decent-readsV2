<?php
namespace App\Models;
use CodeIgniter\Model;

class AuthorModel extends Model{
    protected $table = 'authors';
    protected $allowedFields = [
        'author_name',
        'about_the_author',
        'author_handle',
        'author_birth_place',
        'author_personal_site',
    ];

    public function getAuthors($author_id = false){
        if($author_id === false){
            return $this->findAll();
        }
        return $this->where(['author_id' => $author_id])->first();
    }

    public function getAuthorNameByAuthorId($author_id){
        return $this->select(['author_name'])->where(['author_id' => $author_id])->first();
    }
}