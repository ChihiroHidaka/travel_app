/* global $ */
/* global google */
/* global createMarker */
/* global initMap */

let map;
let service;
let infowindow;

//1,初期値の表示(URLに記載のコールバック関数）
function initMap() {
  const sydney = new google.maps.LatLng(-33.867, 151.195);

//Gooogle.maps.InfoWindow クラスの新しいインスタンスを作成
//InfoWindow クラスは、マップ上の特定の位置に情報ウィンドウを表示するためのクラス
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
            <p style="text-decoration:underline;margin-top:5px;">観光地情報</p>
            <div>・名前：${results[i].name}</div>
            <div>・住所：${results[i].formatted_address}</div>
            <div>※詳細は赤マーカーからGoogle MAPへ</div>
            <img src="${results[0].photos[0].getUrl()}" style="height:350px; width:250px; padding-left:30px;">
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
              <p style="text-decoration:underline;margin-top:5px;">【観光地情報】</p>
              <div>・名前：${results[i].name}</div>
              <div>・住所：${results[i].formatted_address}</div>
              <div>※詳細は赤マーカーからGoogle MAPへ</div>
              <img src="${results[0].photos[0].getUrl()}" style="height:350px; width:250px; padding-left:30px;">
          </div>
        `
        document.getElementById('placeInfo').innerHTML = html;
      }
      map.setCenter(results[0].geometry.location);
    }
  })
});
