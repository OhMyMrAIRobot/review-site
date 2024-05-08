<div class="col-span-1 font-bold pl-3 pt-3 pb-3 border-b border-r overflow-x-hidden">{{(request('page') ?? 1) * 10 + $key - 9}}</div>

<div class="col-span-2 text-gray-500 pl-3 border-b pt-3 pb-3 border-r overflow-x-hidden">{{ $user->username }}</div>

<div class="col-span-4 text-gray-500 pl-3 border-b pt-3 pb-3 border-r overflow-x-hidden">{{ $user->email }}</div>

<div class="col-span-2 text-gray-500 pl-3 border-b pt-3 pb-3 border-r overflow-x-hidden">
    <span class="cursor-default relative z-10 rounded-full bg-gray-100 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-200">
        {{$user->admin ? trans('admin/users.admin') : trans('admin/users.user') }}
    </span>
</div>

<form action="{{route('users.destroy', $user->id)}}" method="POST" class = "flex gap-x-12 col-span-3 border-b pl-3 pt-3 pb-3 border-r">
    @csrf
    @method('DELETE')
    <a href = "{{route('users.edit', $user->id)}}" class="block h-fit text-white rounded-full font-medium bg-green-600 px-4 py-0.5 hover:bg-green-700"
    >@lang('admin/users.edit')</a>
    <button type="submit" class="block h-fit text-white rounded-full font-medium bg-red-600 px-4 py-0.5 hover:bg-red-700"
    >@lang('admin/users.delete')</button>
</form>
