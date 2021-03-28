@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5 text-right">
            @include('partials.alerts')
            <form action="{{route('badge.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">عنوان مدال</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="required_number">حد نصاب</label>
                    <input type="number" name="required_number" id="required_number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="icon_url">آیکن</label>
                    <input type="url" name="icon_url" id="icon_url" class="form-control">
                </div>
                <div class="form-group">
                    <label for="type">نوع</label>
                    <select name="type" id="type" class="form-control">
                        <option value="0">XP</option>
                        <option value="1">تاپیک</option>
                        <option value="2">پاسخ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">توضیحات</label>
                    <textarea class="form-control" name="description" id="description" rows="6"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">ارسال</button>
            </form>
        </div>
    </div>
@endsection
