<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use App\Helpers\Helper;
use App\Models\Destination;
use Illuminate\Http\Request as Req;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function review(Req $req, $destination_id)
    {
        $validation = Validator::make($req->all(), [
            'star_count' => 'required',
            'review_description' => 'required'
        ]);

        if ($validation->fails()) {
            return Helper::APIResponse('error validation', 422, $validation->errors(), null);
        }

        Review::create([
            'star' => $req->star_count,
            'review_description' => $req->review_description,
            'user_id' => Auth::id(),
            'destination_id' => $destination_id
        ]);

        return Helper::APIResponse('success', 200, null, null);
    }
}
