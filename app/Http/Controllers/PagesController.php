<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//use App\Models\User;
use App\Models\Topic;
use App\Models\Banner;
//use App\Models\Role;
use Illuminate\Http\Request;
//use Rss;
//use Purifier;
//use Phphub\Handler\EmailHandler;
//use Jrean\UserVerification\Facades\UserVerification;

class PagesController extends Controller
{
    public function home(Topic $topic)
    {
        $topics = $topic->getTopicsWithFilter('excellent');
        $banners = Banner::allByPosition();
        return response()->json([
            'topics' => $topics,
            'banners' => $banners
        ]);

    }
}
