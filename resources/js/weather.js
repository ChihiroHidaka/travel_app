/* global $ */
 
    
$(function() {
  const apiKey = 'a911bc82d075645e97bb5602ed84bbb2';
　const icon = '';
    
    　//ボタンを押した時に関数を発生させる
    $('#weather_check').click(function(event){
      let cityName =　$('#city_name').val();
  
      $.ajax({
        type: 'GET',
        cache:false,
        url: `https://api.openweathermap.org/data/2.5/weather?q=${cityName}&lang=ja&appid=${apiKey}&units=metric`,
        dataType:'json',
      })
      //通信が成功したとき
      .done(function (res){
        const iconList = `https://openweathermap.org/img/wn/`
        let icon = `
            <img src="${iconList+res.weather[0].icon}@2x.png">
        `
        let html =`
           <div>天気：${res.weather[0].description}</div>
            <div>気温：${res.main.temp}℃</div>
            <div>最高気温：${res.main.temp_max}℃</div>
            <div>最低気温：${res.main.temp_min}℃</div>
            <div>湿度：${res.main.humidity}％</div>
        `;
          //上記で作成したHTMLを読み込む（上書き）
          $('#weather_icon').html(icon);
          $('#weather_response').html(html);
          
          })
        
      //失敗した場合
      .fail(function(res){
        $('#weather_response').html('エラーが発生しています。確認してください');
      });
  });
});

//5日間の天気
$(function(){
  const api_Key = 'a911bc82d075645e97bb5602ed84bbb2'
  const icon = ''
　//ボタンを押した時に関数を発生させる
  $('#weather_check_forecast').click(function(event){
    let cityName =　$('#cityName').val();
  
    $.ajax({
      type: 'GET',
      cache:false,
      url: `https://api.openweathermap.org/data/2.5/forecast?q=${cityName}&lang=ja&appid=${api_Key}&units=metric`,
      dataType:'json',
    })
    
    //通信が成功したとき
    .done(function (res){
      // console.log(res);
      const iconList = `https://openweathermap.org/img/wn/`;
      let icon_forecast ="";
      let html_forecast ="";
      for (let i=0; i < res.list.length; i++){
        if(i % 4 == 0){
        let icon_forecast = `
           <div class="weekly_item_icon">
              <img src="${iconList + res.list[i].weather[0].icon}@2x.png">
          </div>    
         `
        let html_forecast =`
        　　<div class="weekly_item_details">
              <li>${res.list[i].dt_txt}</li>
              <li>天気：${res.list[i].weather[0].description}</li>
              <li>湿度：${res.list[i].main.humidity}%</li>
              <li>気温：${res.list[i].main.temp}℃</li>
              <li>最高気温：${res.list[i].main.temp_max}℃</li>
              <li>最低気温：${res.list[i].main.temp_min}℃</li>
            </div>  
        `;
        
        let weather_forecast =`
        <div class="weekly_item">
            <div>${icon_forecast}</div>
            <div>${html_forecast}</div>
         </div>
        `  
        // //上記で作成したHTMLを読み込む（上書き）
        // $('#weather_icon_forecast').append(icon_forecast);
        // $('#weather_response_forecast').append(html_forecast);
        $('.weekly').append(weather_forecast);
          
      }
      };
    }) 
      
      
    //失敗した場合
    .fail(function(res){
      $('#weather_response').html('エラーが発生しています。確認してください');
    });
  });
});

  
    