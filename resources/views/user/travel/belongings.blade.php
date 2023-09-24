@extends('layouts.menu')

@section('title', '持ち物チェック')


@section('content')

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
    
    <div class = "addButtom" style="border-bottom:1px #ddd solid;">
        <label class="belongings_add">
            <input id="belongings_name" name="belongs_name" type="text" placeholder="カメラ"　value="{{ old('belongs_name') }}">
        </label>
        <button type="submit">この持ち物を追加する</button></br>
        <div style="color: #ffffff;margin-left:30px;">事前に持ち物を追加して、出発前に忘れ物チェックしよう！</div>
    </div>
</form>

<div><a href=https://www.gov-online.go.jp/useful/article/201412/4.html>参考：機内に持込・受託禁止物</div>
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
               <!--name属性にbelongings[]という配列の形式を使うことで、チェックされたアイテムのIDを配列としてサーバーに送信-->
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
<!--<div><a href="/user/travel">ホーム画面に戻る</a></div>-->








    

@endsection