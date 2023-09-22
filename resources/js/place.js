let map;
let service;
let infowindow;

//1,初期値の表示(URLに記載のコールバック関数）
function initMap() {
  const sydney = new google.maps.LatLng(-33.867, 151.195);

  infowindow = new google.maps.InfoWindow();
  map = new google.maps.Map(document.getElementById("map"), {
    center: sydney,
    zoom: 15,
  });
  
　//APIで取得したい情報
  const request = {
    query: "Museum of Contemporary Art Australia",
    fields: ["name","place_id","geometry","formatted_address","icon","photos"],
  };
　console.log(request);
　
　//findPlaceQueryにて,クエリに基づいた検索を行う
  service = new google.maps.places.PlacesService(map);
  service.findPlaceFromQuery(request, (results, status) => {
    if (status === google.maps.places.PlacesServiceStatus.OK && results) {
      for (let i = 0; i < results.length; i++) {
        createMarker(results[i]);
         let html =`
        <div class="placeDetails">
            <div>「観光地情報」</div>
            <div>・名前：${results[i].name}</div>
            <div>・住所：${results[i].formatted_address}</div>
            <div>※詳細は地図の赤マーカーからGoogle MAPへ</div>
            <img src="${results[0].photos[0].getUrl()}" height="350" width="250" padding-left="30">
        </div>
      `
      
      document.getElementById('placeInfo').innerHTML = html;

      }
      map.setCenter(results[0].geometry.location);
    }
  });
}

//マーカー表示
function createMarker(place) {
　//該当しないデータは処理を止める
  if (!place.geometry || !place.geometry.location) return;

  const marker = new google.maps.Marker({
    map,
    position: place.geometry.location,
  });

  google.maps.event.addListener(marker, "click", () => {
    infowindow.setContent(place.name || "");
    infowindow.open(map);
  });
}

window.initMap = initMap;



//2,検索ボタンから新たな観光地を調べる
document.getElementById('searchButton').addEventListener('click', () => {
// 入力フィールドからクエリを取得
const query = document.getElementById('placeSearchInput').value;

// 新しい検索リクエストオブジェクトを作成
const request = {
  query,
  fields: ["name","place_id","geometry","formatted_address","icon","photos"],
};
console.log(request);

//findPlaceQueryにて,クエリに基づいた検索を行う
service.findPlaceFromQuery(request, (results, status) => {
  console.log(results);
  if (status === google.maps.places.PlacesServiceStatus.OK && results) {
    for (let i = 0; i < results.length; i++) {
      createMarker(results[i]);
      let html =`
        <div class="placeDetails">
        　 <div>「観光地情報」</div>
            <div>・名前：${results[i].name}</div>
            <div>・住所：${results[i].formatted_address}</div>
            <div>詳細は地図の赤マーカーからGoogle MAPへ</div>
            <img src="${results[0].photos[0].getUrl()}" height="350" width="250" padding-left="30">
        </div>
      `
      
      document.getElementById('placeInfo').innerHTML = html;

    }
    map.setCenter(results[0].geometry.location);
  }
})

});

// //マーカー表示
// function createMarker(place) {
// 　//該当しないデータは処理を止める
//   if (!place.geometry || !place.geometry.location) return;

//   const marker = new google.maps.Marker({
//     map,
//     position: place.geometry.location,
//   });

//   google.maps.event.addListener(marker, "click", () => {
//     infowindow.setContent(place.name || "");
//     infowindow.open(map);
//   });
// }

// window.initMap = initMap;

















// // 初期画面
// const key ='AIzaSyA9g-sWFwUCDm4xXcBnQU-G2b7qDlObDrY'
// $(function(){//一つでいい
//     navigator.geolocation.getCurrentPosition(
//         function(position) {
//             draw_by_address("東京タワー");
//         }
//     );
    
//     $('#searchButton').on("click", function(){
//         let input_address = $("#placeSearchInput").val();
//         draw_by_address(input_address);
//     });
    
    
// });

// // 地名から地図を表示
// const draw_by_address = (input_address) => { 
//     let geocoder = new google.maps.Geocoder();
//     geocoder.geocode(
//         {
//             'address':  input_address
//         }, 
//         function(results, status) { // 結果
//             if (status === google.maps.GeocoderStatus.OK) { // ステータスがOKの場合
//                 let map = new google.maps.Map(document.getElementById('map'), 
//                     {
//                         center: results[0].geometry.location, // 地図の中心を指定
//                         zoom: 15 // 地図のズームを指定
//                     }
//                 );
//                 let marker = new google.maps.Marker(
//                     {
//                         position: results[0].geometry.location, // マーカーを立てる位置を指定
//                         map: map // マーカーを立てる地図を指定
//                     }
//                 );
                
//                 $.ajax({
//                     type: 'GET',
//                     cathe:false,
//                     url: `https://maps.googleapis.com/maps/api/place/findplacefromtext/json
//                         ?fields=name,place_id,geometry,formatted_address,url
//                         &input=${input_address}
//                         &inputtype=textquery
//                         &key=key`,
//                     dataType:'json',
//                     })
                        
//                     //通信が成功したとき
//                     .done(function (res){
//                         console.log(res);//データの確認用
//                         let infoWindow = new google.maps.InfoWindow(
//                             { // 吹き出しの追加
//                             content:"<div class='maker'>" + input_address + "</div>" // 吹き出しに表示する内容
                                        
//                         });
                
//                             infoWindow.open(map, marker); // 吹き出しの表示
//                             $("#address").val(input_address);
                  
//                             // let latlng = results[0].geometry.location;
//                             // let glat = latlng.lat();
//                             // let glng = latlng.lng();
            
//                             // $("#lat").val(glat);
//                             // $("#lng").val(glng);
//                 })
                                      
//                   //失敗した場合
//                 .fail(function(res){
//                     $('#weather_response').html('エラーが発生しています。確認してください');
//                     })   
//                     } else { // 失敗した場合
//                 alert(status);
//             }
//         }
//     );
// };





// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

/* global $ */
/* global google */
/* global createMarker */
/* global initMap */

// console.log("実行された");

// let map;
// let service;
// let infowindow;


// $(document).ready(function() {
//   // function initMap() {
//     navigator.geolocation.getCurrentPosition(
//         function(position) {
//             // 現在地の緯度経度所得
//             let lat = position.coords.latitude;
//             let lng = position.coords.longitude;
//             // draw_by_latlng(lat, lng);
//         }
//     );
// }
//   const searchButton = $("#searchButton");
  
//   searchButton.click(function() {
//     // alert("クリックされた");
//     const keyword = $("#placeSearchInput").val();
//     // alert(keyword);
//     const request = {
//       query: keyword,
//       fields: ["name","place_id","geometry","formatted_address","url"],
//     };

//     service.findPlaceFromQuery(request, function(results, status) {
//       alert("OK");
//       if (status === google.maps.places.PlacesServiceStatus.OK && results) {
//         alert("OK");
//         for (let i = 0; i < results.length; i++) {
//           createMarker(results[i]);
//         }

//         map.setCenter(results[0].geometry.location);
//       }
//     });
//   });
// });

/* global $ */
// $(function(){
//   const apiKey = 'AIzaSyA9g-sWFwUCDm4xXcBnQU-G2b7qDlObDrY'
 

// 　//ボタンを押した時に関数を発生させる
//   $('#searchButton').click(function(event){
//     let cityName =　$('placeSeac').val();
    
//     $.ajax({
//       type: 'GET',
//       cathe:false,
//       url: `https://maps.googleapis.com/maps/api/place/findplacefromtext/json
//             ?fields=name,place_id,geometry,formatted_address,photo,url
//             &input=cityName
//             &inputtype=textquery
//             &key=${apiKey}`,
//       dataType:'json',
//     })
    
    
//     //通信が成功したとき
//     .done(function (res){
//       console.log(res);//データの確認用
      
      
//       // let html = `
        
//       // `
//       // //上記で作成したHTMLを読み込む
//       // $('#weather_response').append(html);
      
//       })
      
//     //失敗した場合
//     .fail(function(res){
//       $('#weather_response').html('エラーが発生しています。確認してください');
//     }) 
    

//   }) 
// })
  