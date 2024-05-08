<div style="overflow-wrap: break-word" class="col-span-1 font-bold pl-3 pt-3 pb-3 border-b border-r">{{(request('page') ?? 1) * 50 + $key - 49}}</div>

<div style="overflow-wrap: break-word" class="col-span-2 text-gray-500 font pl-3 pt-3 pb-3 border-b border-r">{{$users[$activity->user_id] ?? 'Guest'}}</div>

<div style="overflow-wrap: break-word" class="col-span-2 text-gray-500 pl-3 pt-3 pb-3 border-b border-r">{{ $activity->ip }}</div>

<div style="overflow-wrap: break-word" class="col-span-1 text-gray-500 pl-3 pt-3 pb-3 border-b border-r">{{$activity->browser}}</div>

<div style="overflow-wrap: break-word" class="col-span-1 text-gray-500 pl-3 pt-3 pb-3 border-b border-r">{{$activity->os}}</div>

<div style="overflow-wrap: break-word" class="col-span-3 text-gray-500 pl-3 pt-3 pb-3 border-b border-r">{{$activity->url}}</div>

<div style="overflow-wrap: break-word" class="col-span-2 text-gray-500 pl-3 pt-3 pb-3 border-b border-r">{{ \Carbon\Carbon::parse($activity->created_at)->format('G:i:s d-m-Y') }}</div>
