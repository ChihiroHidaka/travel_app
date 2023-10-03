{{-- layouts/menu.blade.phpを読み込む --}}
@extends('layouts.menu')
{{-- menu.blade.phpの@yield('title')に埋め込む --}}
@section('title', '持ち物チェック')
{{-- menu.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<h1>持ち物チェック</h1>
<div class="belongingsCheckboxPage">
    <form method="POST" action="{{route('belongings.store')}}" id="belongingsForm">
        @csrf
       @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    
        <div class="belongings_add">
            <label>
                <input id="belongings_name" name="belongs_name" type="text" placeholder="カメラ"　value="{{ old('belongs_name') }}">
            </label>
            <button type="submit">この持ち物を追加する</button></br>
            <div style="color: #432;">事前に持ち物を追加して、出発前に忘れ物チェックしよう！</div>
        </div>
    </form>
    
    <div>
        <form method="POST" action="{{route('belongings.check')}}" id="belongingsForm">
        @csrf
              　<table id="belongings_list">
                    <thead>
                        <tr>
                            <th>チェック</th>
                            <th>持ち物名</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($belongings as $belongings)
                        <tr class="BlongingsCreate">
                           <td class = "checkbox"><input type="checkbox" name="belongings[]" @if($belongings->checked) checked @endif value="{{$belongings->id }}" {{ old('belongings') ? 'checked' : '' }}>
                           <td class = "listName">{{$belongings->belongs_name}}</td>.
                           <td><a href="/user/travel/belongings/{{$belongings->id}}/edit">編集</a></td>
                           <td><a href="/user/travel/belongings/{{$belongings->id}}/delete">削除</a></td>
                        </tr>
                    @endforeach    
                    </tbody>
                </table>
            <button  class = "check" type="submit">持ち物チェックを完了する</button>
        </form>
    </div>
</div>
<!--<div><a href="/user/travel">ホーム画面に戻る</a></div>-->

@endsection