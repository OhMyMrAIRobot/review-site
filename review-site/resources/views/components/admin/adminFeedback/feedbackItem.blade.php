<div class="col-span-1 font-bold pl-3 pt-3 pb-3 border-b border-r overflow-x-hidden">{{(request('page') ?? 1) * 10 + $key - 9}}</div>

<div class="overflow-hidden line-clamp-3 max-h-[5.5rem] border-b leading-6 text-base col-span-3 text-gray-500 pl-3 pt-3 pb-3 hover:text-indigo-600 hover:bg-gray-100 cursor-pointer border-r overflow-x-hidden">
    <a href="{{route('feedback.reply', $feedback->id)}}">
        {{$feedback->description}}
    </a>
</div>

<div class="col-span-2 text-gray-500 pl-3 border-b pt-3 pb-3 border-r overflow-x-hidden">{{ \Carbon\Carbon::parse($feedback->created_at)->format('G:i M j, Y') }}</div>

<div class="col-span-3 text-gray-500 pl-3 pt-3 pb-3 border-r border-b overflow-x-hidden" style="text-overflow: ellipsis">{{$feedback->email}}</div>

<form action="{{route('feedback.destroy', $feedback->id)}}" method="POST" class = "flex gap-x-12 col-span-3 border-b pl-3 pt-3 pb-3 border-r">
    @csrf
    @method('DELETE')
    <a href = "{{route('feedback.reply', $feedback->id)}}" class="block h-fit text-white rounded-full font-medium bg-green-600 px-4 py-0.5 hover:bg-green-700"
    >@lang('admin/feedback.reply')</a>
    <button type="submit" class="block h-fit text-white rounded-full font-medium bg-red-600 px-4 py-0.5 hover:bg-red-700"
    >@lang('admin/feedback.delete')</button>
</form>
