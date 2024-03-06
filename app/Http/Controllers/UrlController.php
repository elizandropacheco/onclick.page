<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use App\Models\UrlVisit;

class UrlController extends Controller
{
    protected $url;
    protected $urlVisit;

    public function __construct(Url $url, UrlVisit $urlVisit)
    {
        $this->url = $url;
        $this->urlVisit = $urlVisit;
    }

    public function redir(?string $shortcode,Request $request)
    {
            $url = $this->url->where('short',$shortcode)->firstOrFail();
            $urlVisit = new UrlVisit();
            $urlVisit->url_id = $url->id;
            $urlVisit->ip_address = $request->ip();
            $urlVisit->user_agent = $request->userAgent();
            $urlVisit->operating_system = ($request->header('sec-ch-ua-platform') == null) ? 'None' : $request->header('sec-ch-ua-platform');
            $urlVisit->device_type = ($request->header('sec-ch-ua-mobile') == '?0') ? 'Desktop' : 'Mobile';
            $urlVisit->visited_at = new \DateTime();
            $urlVisit->save();
            return redirect()->away($url->destination);

    }
}
