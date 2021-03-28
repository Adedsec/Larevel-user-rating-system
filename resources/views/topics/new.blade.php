@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 text-right">
            @include('partials.alerts')
            <form action="{{route('topic.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان مطلب</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="form-group">
                    <label for="text">متن</label>
                    <textarea name="text" id="text" cols="30" rows="6" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">ارسال</button>
            </form>
        </div>
    </div>
@endsection
