@extends('layouts.adminActionBase')

@section('page.title')
    @lang('admin/feedback.pageReply')
@endsection

@section('adminFormTitle')
    @lang('admin/feedback.message')
@endsection

@section('adminFormBody')
    <form method="POST" action="{{route('feedback.send')}}" class="bg-white py-3 h-fit w-1/2 border rounded-xl">
        @csrf
        <input type="hidden" name = "sender" value="{{\Illuminate\Support\Facades\Auth::user()->getUsername()}}">
        <div class="flex items-center">
            <label class="pl-4 font-bold pb-2" for="email">@lang('admin/feedback.receiver'): </label>
            <input name="email" id="email" readonly
                   class="text-base text-gray-500 w-full border-none outline-none pb-2 px-4" value="{{$feedback->email}}">
        </div>

        <div>
            <label for="title"></label>
            <input name="title" id="title" placeholder="@lang('admin/feedback.title')..."
                   class="text-base w-full font-bold border-none outline-none pb-2 px-4" value="{{old('title')}}">
        </div>

        <div>
            <label for="text"></label>
            <textarea name='text' id="text" placeholder="@lang('admin/feedback.text')"
                      class="text-sm w-full resize-none border-b mt-2 h-32 outline-none px-4 "
            >{{old('description')}}</textarea>
        </div>

        <div class="w-full flex justify-between px-4 items-center">
            <button class="border rounded px-2 py-1 bg-indigo-600 text-white hover:bg-indigo-700 text-center" type="submit">
                @lang('admin/feedback.send')
            </button>
        </div>
    </form>
@endsection

