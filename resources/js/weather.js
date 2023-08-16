/* global $ */
$(function(){
  const apiKey = 'a911bc82d075645e97bb5602ed84bbb2'

　//ボタンを押した時に関数を発生させる
  $('#weather_check').click(function(event){
    let param = {
        data: $('#weather_search').val(),
        api_key: apiKey
    };
    console.log(param);

    $.ajax({
      type: 'GET',
      data: param,
      url: 'https://api.openweathermap.org/data/2.5/weather',
      dataType:'json',
    })
    
    
    //通信が成功したとき
    .done(function (res){
      console.log(res.core);
      //下記 レスポンスフィールドの内容??
      $('#weather.icon').html('src', res.weather.icon);
      $('#weather.main').html(res.weather.main);
      $('#weather.description').html(res.weather.description);
      
      })
      
     //失敗した場合
    .fail(function(res){
      $('#weather_response').html('エラーが発生しています。確認してください');
     }) 
  })
 })
  