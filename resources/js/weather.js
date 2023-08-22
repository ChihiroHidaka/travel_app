/* global $ */
$(function(){
  const apiKey = 'a911bc82d075645e97bb5602ed84bbb2'

　//ボタンを押した時に関数を発生させる
  $('#weather_check').click(function(event){
    let cityName =　$('#city_name').val();
    // console.log(cityName);
　　// return;
　　
    $.ajax({
      type: 'GET',
      cathe:false,
      url: `https://api.openweathermap.org/data/2.5/weather?q=${cityName}&appid=${apiKey}`,
      dataType:'json',
    })
    
    
    //通信が成功したとき
    .done(function (res){
      console.log(res);
      console.log(res.main.temp);
      console.log(res.weather[0]);
      
      let html = `
        <di>${res.}</div>
      
      `
        
      
      // $('#weather').html(res.weather[0]);
      // $('#weatherDescription').html(res.main);
      
      
      })
      
    //失敗した場合
    .fail(function(res){
      $('#weather_response').html('エラーが発生しています。確認してください');
    }) 
  })
 })
  