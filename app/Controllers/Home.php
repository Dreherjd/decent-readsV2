<?php

namespace App\Controllers;
use App\Models\BookReviewModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;

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
        $dateTimeArray = [];
        foreach($reviews as $review){
            $dateTimeArray[$review['book_review_id']] = Time::parse($review['book_review_created'])->toLocalizedString('MMM d, yyyy');
        }
        foreach($authorIds as $authorId){
            $reviewAuthors[$authorId] = $userModel->getUserFullNameByUserId($authorId);
        }

        $data = [
            'title' => 'Index',
            'review_collection' => $reviews,
            'review_author' => $reviewAuthors,
            'review_date_time' => $dateTimeArray,
        ];
        // dd($data);
        return view('templates/header', $data)
             . view('index')
             . view('templates/footer');
    }
}
