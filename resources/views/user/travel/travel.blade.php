<!--旅行の新規登録画面-->
{{-- layouts/menu.blade.phpを読み込む --}}
@extends('layouts.menu')

{{-- menu.blade.phpの@yield('title')に埋め込む --}}
@section('title', '新規旅行作成')

{{-- menu.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<!--下記はデータを引っ張って表示させる-->
<h1>新しい旅行を作成する</h1>
<form method="POST" action="{{ route('travel.store') }}" id="travel_store">
    @csrf
    @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    @endif
   
    <div class = "inputContents">
        <p>☜新しく旅行を作成すると左のメニュー画面に「旅行」が追加されます！</p>
        <label for="travel_title">・旅行のタイトル</label>
        <input type="text" name="title" id="title"　value="{{ old('title')}}"></br>
        <label for="start_date">・出発日</label>
        <input type="date" name="start_date" id="start_date"　value="{{ old('start_date') }}"></br>
        <label for="start_date">・終了日</label>
        <input type="date" name="end_date" id="end_date"　value="{{ old('end_date') }}"></br>
        <label for="description">・詳細</label>
        <input type="textarea" name="description" id="description"value="{{ old('description') }}"></br>
        <!--<label for="image">画像</label>-->
        <!--<input type="file" name="image" id="image"></br>-->
    </div>
    <button style = "margin-top:10px;margin-left:40px;" type="submit">新たな旅行を作成する</button></br>
</form>
@endsection

    
