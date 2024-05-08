@extends('layouts.adminActionBase')

@section('page.title')
    {{$category->category}}
@endsection

@section('adminFormTitle')
    @lang('admin/categories.pageEdit')
@endsection

@section('adminFormBody')
    <form method="POST" action="{{route('categories.update', $category->id)}}" enctype="multipart/form-data" class="bg-white  py-4 px-6 flex flex-col gap-y-6 h-fit w-1/2 border rounded-xl">
        @csrf
        @method('PUT')
        <div>
            <label for = "title" class="block mb-1 text-sm font-medium text-gray-900">@lang('admin/categories.category')</label>
            <input name = "category" id="title" type = "text" placeholder="@lang('admin/categories.category')..." value="{{$category->category}}" class="bg-inherit border border-gray-300 text-gray-900 sm:text-sm rounded-lg outline-none focus:ring-indigo-800 focus:border-indigo-600 block w-full p-2.5">
        </div>
        <button type="submit" class="mt-2 mr-auto border rounded-xl bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white font-bold text-base px-6 py-2"
        >@lang('admin/categories.save')</button>

    </form>
@endsection
