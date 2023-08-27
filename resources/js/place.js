/* global $ */
$(function(){
  const apiKey = 'AIzaSyA9g-sWFwUCDm4xXcBnQU-G2b7qDlObDrY'
 

　//ボタンを押した時に関数を発生させる
  $('#place_search').click(function(event){
    let cityName =　$('place').val();
　　
    $.ajax({
      type: 'GET',
      cathe:false,
      url: `https://maps.googleapis.com/maps/api/place/findplacefromtext/json
            ?fields=
            &input=Museum%20of%20Contemporary%20Art%20Australia
            &inputtype=textquery
            &key=apikey`,
      dataType:'json',
    })
    
    
    //通信が成功したとき
    .done(function (res){
      console.log(res);//データの確認用
      
      
      let html = `
        
      `
      //上記で作成したHTMLを読み込む
      $('#weather_response').append(html);
      
      })
      
    //失敗した場合
    .fail(function(res){
      $('#weather_response').html('エラーが発生しています。確認してください');
    }) 
    

  }) 
})
  
  
  
  
  
  
  
  
  
  