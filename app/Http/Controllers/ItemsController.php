<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Item::with(
            'attribute',
            'attribute.stats',
            'license',
            'aliases',
            'thumbnails',
            'thumbnails.images'
        )->paginate(12);

        $stats_colomns= ['subscriptions','monthlySearches', 'views', 'videosCount', 'rankWl', 'premiumVideosCount', 'whiteLabelVideoCount', 'rank', 'rankPremium'];

        return view('pages.items', ['items'=>$items, 'stats_colomns'=>$stats_colomns ] );
    }
}
