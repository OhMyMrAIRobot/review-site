<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

    public function search(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $date_from = date('Y-m-d', strtotime($request->date_from ?? "2021-01-01")) . ' 00:00:00';
        $date_to = date('Y-m-d', strtotime($request->date_to ?? date('Y-m-d'))) . ' 23:59:59';
        $user_id = User::where('username', $request->search)->first()->id ?? null;

        $activities = Activity::where(function($query) use ($request, $user_id) {
            $query->where('ip', 'like', '%' . $request->search . '%')
                ->orWhere('browser', 'like', '%' . $request->search . '%')
                ->orWhere('os', 'like', '%' . $request->search . '%');
              //  ->orWhere('url', 'like', '%' . $request->search . '%')
              //  ->orWhere('user_id', $user_id);
        })
            ->whereBetween('created_at', [$date_from, $date_to])
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        $activities->withPath('?search=' . $request->search . '&date_from=' . $request->date_from . '&date_to=' . $request->date_to);


        $uniqueIPCount = Activity::whereBetween('created_at', [$date_from, $date_to])
            ->distinct('ip')
            ->count('ip');

        $totalIpCount = Activity::whereBetween('created_at', [$date_from, $date_to])->count('ip');
        $users = User::all()->pluck('username', 'id')->toArray();

        return view('admin/statistics.index', [
            'activities' => $activities,
            'users' => $users,
            'unique' => $uniqueIPCount,
            'total' => $totalIpCount,
        ]);
    }
}
