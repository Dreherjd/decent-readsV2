<?php
namespace App\Models;
use CodeIgniter\Model;

class BookReviewModel extends Model{
    protected $table = 'book_reviews';
    protected $allowedFields = ['book_review_created', 'book_review_user_id', 'book_review_score', 'book_id', 'book_review_title', 'book_review_content', 'number_of_likes', 'complete_or_dnf'];

    public function getBookReviews($review_id = false){
        if($review_id === false){
            return $this->findAll();
        }
        return $this->where(['book_review_id' => $review_id])->first();
    }
}