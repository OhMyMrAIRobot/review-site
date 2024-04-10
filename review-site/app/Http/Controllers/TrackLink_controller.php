<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class TrackLink_controller extends Controller
{
    public function store(Request $request): string
    {
        $url = urldecode($request->input('url'));
        // Поиск записи в базе данных по URL
        $Link = Link::where('url', $url)->first();

        // Если запись не найдена, создать новую запись
        if (!$Link) {
            $Link = Link::create(['clicks' => 0, 'url' => $url]);
        }

        // Увеличить количество кликов
        $Link->increment('clicks');
        return redirect()->away($url);
    }
}
