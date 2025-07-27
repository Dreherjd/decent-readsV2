<?php
namespace App\Models;
use CodeIgniter\Model;

class BookModel extends Model{
    protected $table = 'books';
    protected $allowedFields = [
        'book_title',
        'brief_synops',
        'author_id',
        'published_date',
        'number_of_pages',
        'avg_rating',
        'number_of_reviews',
        'number_of_ratings',
    ];

    public function getBooks($book_id = false){
        if($book_id === false){
            return $this->findAll();
        }
        return $this->where(['book_id' => $book_id])->first();
    }
}