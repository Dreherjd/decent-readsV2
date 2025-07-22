<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\BookReviewModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        $reviewModel = model(BookReviewModel::class);
        $userModel = model(UserModel::class);

        /**
         * get reviews and authors first, then put the arrays generated from that
         * into the data array
         */

        $reviews = $reviewModel->getBookReviews();
        $authorIds = array_unique(array_column($reviews, 'book_review_user_id'));
        $reviewAuthors = [];
        foreach($authorIds as $authorId){
            $reviewAuthors[$authorId] = $userModel->getUserByUserId($authorId);
        }

        $data = [
            'title' => 'Index',
            'review_collection' => $reviews,
            'review_author' => $reviewAuthors,
        ];
        // dd($data['review_author']);
        return view('templates/header', $data)
             . view('index')
             . view('templates/footer');
    }
}
