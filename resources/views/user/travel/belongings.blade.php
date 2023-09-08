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
    
    <div>
        <label class="belongings add">
            <input id="belongings_name" name="belongs_name" type="text" placeholder="カメラ"　value="{{ old('belongs_name') }}">
        </label>
        <button type="submit">持ち物を追加する</button></br>
        <div style="color : #ffcc00;">事前に持ち物を追加して、旅行前に忘れ物チェックしておこう！</div>
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
               <!--name属性にbelongings[]という配列の形式を使うことで、チェックされたアイテムのIDを配列としてサーバーに送信-->
               <td class = "checkbox"><input type="checkbox" name="belongings[]" @if($belongings->checked) checked @endif value="{{$belongings->id }}" {{ old('belongings') ? 'checked' : '' }}>
               <td class = "listName">{{$belongings->belongs_name}}</td>.
               <td><a href="/user/travel/belongings/{{$belongings->id}}/edit">編集</a></td>
               <td><a href="/user/travel/belongings/{{$belongings->id}}/delete">削除</a></td>
            </tr>
        @endforeach    
        
        </tbody>
    </table>
    <button  type="submit">持ち物チェックを完了する</button>
    </form>
        
</div>
<!--<div><a href="/user/travel">ホーム画面に戻る</a></div>-->








    

@endsection