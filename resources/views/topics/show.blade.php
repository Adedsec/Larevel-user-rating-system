@extends('layouts.app')

@section('title',$topic->title)

@section('content')
    <div class="mt-5 text-right">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$topic->title}}
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{$topic->text}}
                    </p>
                </div>
                <div class="card-footer text-muted">
                    ارسال شده توسط {{$topic->user->name}} در {{$topic->created_at}}
                </div>
            </div>
        </div>
        @foreach ($topic->replies as $reply)
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-body">
                        <p class="card-text">
                            {{$reply->text}}
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        ارسال شده توسط {{$reply->user->name}} در {{$reply->created_at}}

                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-8">
            <form action="{{route('reply.store',$topic->id)}}" class="mt-5" method="post">
                @csrf
                <div class="form-group">
                    <label for="text">افزودن پاسخ</label>
                    <textarea name="text" id="text" class="form-control" placeholder="متن پیام را وارد کنید" cols="30"
                              rows="10"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">ارسال</button>
            </form>
        </div>
    </div>
@endsection
