<?php
namespace App\Models;
use CodeIgniter\Model;

class CommentModel extends Model{
    protected $table = 'comments';
    protected $allowedFields = [
        'comment_content',
    ];

    public function getCommentsByPostId($post_id){
        return $this->where(['post_id' => $post_id])->findAll();
    }
}