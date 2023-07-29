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
        
    </div>

</form>


<div>
  　<table id="belongings_list">
        <thead>
            <tr>
                <th>チェック</th>
                <th>持ち物名</th>
            </tr>
        </thead>
        
        <tbody>
        @foreach($belongings as $belongings)
          <tr class="PlanCreate">
               <td><input type="checkbox" name="checked[]" value="{{$belongings->belongs_name }}"></td>
               <td>{{$belonings->belongs_name}}</td>.
                <td><a href="/user/belongings/edit">編集</a></td>
                <td><a href="/user/belongings/delete">削除</a></td>
            </tr>
        @endforeach    
        </tbody>
    </table>
        
</div>
<!--<div><a href="/user/travel">ホーム画面に戻る</a></div>-->








    

@endsection