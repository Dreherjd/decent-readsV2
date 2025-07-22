<?php
namespace App\Models;
use CodeIgniter\Model;

class PostModel extends Model{
    protected $table = 'posts';
    protected $allowedFields = ['title', 'content', 'created', 'author', 'type'];


    public function getPosts($postId = false){
        if($postId === false){
            return $this->findAll();
        }
        return $this->where(['id' => $postId])->first();
    }


}