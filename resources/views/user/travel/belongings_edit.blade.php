{{-- layouts/menu.blade.phpを読み込む --}}
@extends('layouts.menu')
{{-- menu.blade.phpの@yield('title')に埋め込む --}}
@section('title', '持ち物チェックリストの編集')
{{-- menu.blade.phpの@yield('content')に以下のタグを埋め込む --}}
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
    <div>
        
        <label class="belongings edit">
            <input id="belongings_name" name="belongs_name" type="text" value="{{ old('belongs_name') }}">
            <button style= "margin-left:30px;" type="submit">変更する</button></br>
        </label>
    </div>
</form>

@endsection


