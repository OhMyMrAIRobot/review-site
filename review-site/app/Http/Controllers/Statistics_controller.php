<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function Termwind\renderUsing;

class Statistics_controller extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $activities = Activity::orderBy('created_at', 'desc')->paginate(50);
        $activities->withPath('/admin/statistics');
        $users = User::all()->pluck('username', 'id')->toArray();

        $todayStart = Carbon::today()->startOfDay();
        $todayEnd = Carbon::now();

        $uniqueIPCount = Activity::whereBetween('created_at', [$todayStart, $todayEnd])
            ->distinct('ip')
            ->count('ip');
        $totalIpCount = Activity::whereBetween('created_at', [$todayStart, $todayEnd])->count('ip');

        return view('admin/statistics.index', [
            'activities' => $activities,
            'users' => $users,
            'unique' => $uniqueIPCount,
            'total' => $totalIpCount,
        ]);
    }
}
