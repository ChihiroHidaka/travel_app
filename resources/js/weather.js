/* global $ */
$(function(){
  const apiKey = 'a911bc82d075645e97bb5602ed84bbb2'
  const icon = ''

　//ボタンを押した時に関数を発生させる
  $('#weather_check').click(function(event){
    let cityName =　$('#city_name').val();
　　
    $.ajax({
      type: 'GET',
      cathe:false,
      url: `https://api.openweathermap.org/data/2.5/weather?q=${cityName}&lang=ja&appid=${apiKey}&units=metric`,
      dataType:'json',
    })
    
    
    //通信が成功したとき
    .done(function (res){
      console.log(res);
      console.log(res.main.temp);
      console.log(res.weather[0].main);
      console.log(res.main.humidity);
      const iconList = `https://openweathermap.org/img/wn/`
      
      let html = `
          <div><img src="${iconList+res.weather[0].icon}@2x.png"></div>
          <div>天気情報：${res.weather[0].description}</div>
          <div>湿度：${res.main.humidity}％</div>
          <div>気温：${res.main.temp}℃</div>
          <div>最高気温：${res.main.temp_max}℃</div>
          <div>最低気温：${res.main.temp_min}℃</div>
      `
      //上記で作成したHTMLを読み込む
      $('#weather_response').append(html);//上書きする方がいい？
      
      })
      
    //失敗した場合
    .fail(function(res){
      $('#weather_response').html('エラーが発生しています。確認してください');
    })
    
    //5日間の予報
//     $.ajax({
//       type: 'GET',
//       cathe:false,
//       url: `https://api.openweathermap.org/data/2.5/weather?q=${cityName}&lang=ja&appid=${apiKey}&units=metric`,
//       dataType:'json',
//     })
    
    
//     //通信が成功したとき
//     .done(function (res){
//       console.log(res);
//       console.log(res.main.temp);
//       console.log(res.weather[0].main);
//       console.log(res.main.humidity);
//       const iconList = `https://openweathermap.org/img/wn/`
      
//       let html = `
//           <div><img src="${iconList+res.weather[0].icon}@2x.png"></div>
//           <div>天気情報：${res.weather[0].description}</div>
//           <div>湿度：${res.main.humidity}％</div>
//           <div>気温：${res.main.temp}℃</div>
//           <div>最高気温：${res.main.temp_max}℃</div>
//           <div>最低気温：${res.main.temp_min}℃</div>
//       `
//       //上記で作成したHTMLを読み込む
//       $('#weather_response').append(html);
      
//       })
      
//     //失敗した場合
//     .fail(function(res){
//       $('#weather_response').html('エラーが発生しています。確認してください');
//     }) 
    
    
    
    
    
    
    
    
    
    
    
    
  })
})
  
  
  
  
  
  
  
  
  
  