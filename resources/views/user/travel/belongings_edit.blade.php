@extends('layouts.menu')


@section('title', '持ち物チェックリストの編集')


@section('content')
<form method="POST" action="{{route('belongings.update',['id' =>$belongings->id])}}" id="belongingsForm">
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
    <h1>持ち物リストを編集する</h1>
    <div class = "edit">
        <label class="belongings edit">
        <input id="belongings_name" name="belongs_name" type="text" value="{{ old('belongs_name') }}">
        <button type="submit">変更する</button></br>
       </label>
    </div>
  
</form>


@endsection


