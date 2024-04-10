<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class TrackLink_controller extends Controller
{
    public function store(Request $request): string
    {
        $url = urldecode($request->input('url'));
        $Link = Link::where('url', $url)->first();

        if (!$Link) {
            $Link = Link::create(['clicks' => 0, 'url' => $url]);
        }

        $Link->increment('clicks');
        return redirect()->away($url);
    }
}
