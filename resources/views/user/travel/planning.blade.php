{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.home')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'planning')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<form method="post" action=/user/travels/</form>
    @csrf
    <label for="destination">目的地:</label>
    <input id="destination" name="destination" type="text">
    
    <label for="start_date">出発日</label>
    <input id="start_date" name="start_date" type="date">
    
    <label for="start_date">終了日</label>
    <input id="end_date" name="end_date" type="date"></br>
    
    

<form method="POST" action="/trips" id="travelForm">
    @csrf
   <label for="first_day">1日目</label></br>
   <input id="first_day" name="first_day" type="date"></input>
   
    <table id="travelplan">
        <thead>
            <tr>
                <th>時間</th>
                <th>目的地もしくは移動手段</th>
                <th>メモ</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <tr class="travel-detail">
                <td><input id="time" name="details[0][time]" type="time"></td>
                <td><input id="destination" name="details[0][destination]" type="text"></td>
                <td><input id="remarks" name=datails[0][remarks] type="text"></td>
                <td><button type="button" class="remove-detail">削除</button></td>
                <td><button type="button" class="edit-datals">編集</button></td>
            </tr>
        </tbody>
    </table>
    <button type="button" id="addPlan">次の予定を追加</button>
    <button type="submit">1日目の予定を保存する</button>
</form>

<button type="button" id="addday">2日目も作成する</button>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
    var detailIndex = 1;

    $('#addPlam').click(function () {
        $('#travelplan').append(
        
</script>

<script>
$(document).ready(function () {
var detailIndex = 1;

    $('#addday').click(function () {
        $('#travelForm').append(

[2日目]から追加していく



 
@endsection