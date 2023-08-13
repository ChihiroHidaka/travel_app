@extends('layouts.app')


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
    
    <div>
        <label class="belongings edit">
            <input id="belongings_name" name="belongs_name" type="text" value="{{ old('belongs_name') }}">
        </label>
        <button type="submit">編集を完了する</button></br>
        
    </div>

</form>


@endsection


