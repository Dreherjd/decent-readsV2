<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\BookReviewModel;
use App\Models\UserModel;
use App\Models\AuthorModel;
use App\Models\CommentModel;
use CodeIgniter\I18n\Time;

class ViewController extends BaseController{
    public function viewPost(String $review_id){
        //instantiate the models you'll need
        $reviewModel = model(BookReviewModel::class);
        $userModel = model(UserModel::class);
        $bookModel = model(BookModel::class);
        $authorModel = model(AuthorModel::class);
        $commentModel = model(CommentModel::class);

        //gather data into a format that can be passed into the data array
        $review = $reviewModel->getBookReviews($review_id);
        $review_author = $userModel->getUserFullNameByUserId($review['book_review_user_id']);
        $time = Time::parse($review['book_review_created']);
        $review_date_humanized = $time->humanize();
        $book_author = $bookModel->getBooks($review['book_id']);
        $pub_date_humanized = Time::parse($book_author['published_date'])->toLocalizedString('MMM d, yyyy');
        $book_author_name = $authorModel->getAuthorNameByAuthorId($book_author['author_id']);
        $comments = $commentModel->getCommentsByPostId($review['book_review_id']);
        $comment_authors = [];
        foreach($comments as $comment){
            $comment_authors[$comment['comment_id']] = $userModel->getUserFullNameByUserId($comment['author']);
        }

        $data = [
            'review' => $review,
            'title' => $review['book_review_title'],
            'review_author' => $review_author,
            'review_date' => $review_date_humanized,
            'book_author' => $book_author,
            'book_author_name' => $book_author_name,
            'pub_date' => $pub_date_humanized,
            'comments' => $comments,
            'comment_authors' => $comment_authors,
        ];
        // dd($data);
        return view('templates/header', $data)
             . view('viewPost')
             . view('templates/footer');
    }
}