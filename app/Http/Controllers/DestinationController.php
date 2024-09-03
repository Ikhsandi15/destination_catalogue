<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Destination;
use Illuminate\Http\Request as Req;

class DestinationController extends Controller
{
    public function destinationLists(Req $req)
    {
        $query = Destination::query();

        $category = $req->query('category');
        $province = $req->query('province');
        $city = $req->query('city');

        if ($category) {
            $query->where('category', $category);
        }
        if ($province) {
            $query->where('province', $province);
        }
        if ($city) {
            $query->where('city', $city);
        }

        $datas = $query->get();

        return Helper::APIResponse('success', 200, null, $datas);
    }

    public function detailDestination($destination_id)
    {
        $destinations = Destination::with([
            'reviews' => function ($query) {
                $query->select('id', 'destination_id', 'star', 'review_description');
            }
        ])->where('id', $destination_id)->first();

        $destinations->load(['reviews.user' => function ($query) {
            $query->select('id', 'name', 'photo');
        }]);

        return Helper::APIResponse('success', 200, null, $destinations);
    }
}
