{{-- layouts/home.blade.phpを読み込む --}}
@extends('layouts.menu')


{{-- home.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'planning')

{{-- home.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<!--下記はデータを引っ張って表示させる-->
<div>
    <label for="planname">旅行名</label>
    <input id="planname" name="title" type="text">
    
    <label for="start_date">出発日</label>
    <input id="start_date" name="start_date" type="date">
    
    <label for="start_date">終了日</label>
    <input id="end_date" name="end_date" type="date"></br>
    
</div>
   

    
<!--下記からユーザーによるデータ入力-->
<form method="POST" action="{{ route('plan.store') }}" id="travelForm">
    @csrf
   <input id="day" name="plan_date" type="date"></input>
   
    <table id="travelplan">
        <thead>
            <tr>
                <th>開始時間</th>
                <th>終了時間</th>
                <th>目的地もしくは移動手段</th>
                <th>備考</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <tr class="travel-detail">
                <td><input id="fromtime" name="details[0][from_time]" type="time" value="{{ old('from_time') }}"></td>
                <td><input id="endtime" name="details[0][end_time]" type="time" value="{{ old('end_time') }}"></td>
                <td><input id="plan" name="details[0][plan]" type="text" value="{{ old('plan') }}"></td>
                <td><input id="remarks" name=datails[0][remarks] type="text" value="{{ old('remarks') }}"></td>
                <td><button type="button" class="remove-detail">削除</button></td>
                <td><button type="button" class="edit-datals">編集</button></td>
            </tr>
        </tbody>
    </table>
    <button type="button" id="addPlan">次の予定を追加する</button></br>

<button type="button" id="addday">次の日</button></br>
<button type="submit">全ての予定を保存する</button></br>
</form>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
　　//行程表の追加
    $(document).ready(function () {
    var detailIndex = 1;

    $('#addPlan').click(function () {
        $('#travelplan').append(
         　  <td><input id="fromtime" name="details[0][from_time]" type="time" value="{{ old('from_time') }}"></td>
                <td><input id="endtime" name="details[0][end_time]" type="time" value="{{ old('end_time') }}"></td>
                <td><input id="plan" name="details[0][plan]" type="text" value="{{ old('plan') }}"></td>
                <td><input id="remarks" name=datails[0][remarks] type="text" value="{{ old('remarks') }}"></td>
                <td><button type="button" class="remove-detail">削除</button></td>
                <td><button type="button" class="edit-datals">編集</button></td>
            
    //2日目以降を作成する
    $(document).ready(function () {
    var detailIndex = 1;

    $('#addday').click(function () {
        $('#travelForm').append(
   <input id="day" name="plan_date" type="date"></input>
   
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
             <td><input id="fromtime" name="details[0][from_time]" type="time" value="{{ old('from_time') }}"></td>
                <td><input id="endtime" name="details[0][end_time]" type="time" value="{{ old('end_time') }}"></td>
                <td><input id="plan" name="details[0][plan]" type="text" value="{{ old('plan') }}"></td>
                <td><input id="remarks" name=datails[0][remarks] type="text" value="{{ old('remarks') }}"></td>
                <td><button type="button" class="remove-detail">削除</button></td>
                <td><button type="button" class="edit-datals">編集</button></td>
        </tbody>
    </table>
    <button type="button" id="addPlan">次の予定を追加する</button>
</script>

 
@endsection