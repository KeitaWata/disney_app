<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Leaflet  CSS-->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
crossorigin=""/>
<!-- Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
crossorigin=""></script>
<style type="text/css">
#map { height: 500px; }
</style>

<title>Disney Navigator</title>
</head>
<body>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href=https://muds.gdl.jp/~s20220/disney_nav.php>Disney Navigator</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div>
    <img src="home_img5.png" class="img-fluid">
    </div>
    
    
    <div class="text-center py3">
        <h2 class="m-3">使い方</h2>
    </div>
    
    <div class="container-fluid bg-light">
        <h2><span class="badge badge-success ml-5">STEP 1</span></h2>
    </div>
    
    <div class="text-center py3 m-3">
        <h3>探したいカテゴリーを指定する</h3>
        <img src="home_img2.png" class="w-50 h-50">
    </div>
    
    <div class="container-fluid bg-light">
        <h2><span class="badge badge-success ml-5">STEP 2</span></h2>
    </div>
    
    <div class="text-center py3 m-3">
        <h3>カテゴリーで選択した中で現在地に近い場所を提案する</h3>
        <img src="home_img3.png" class="w-50 h-50">
    </div>
    
    <div class="container-fluid bg-light">
        <h2><span class="badge badge-success ml-5">STEP 3</span></h2>
    </div>
    
    <div class="text-center py3 m-3">
        <h3>提案された中から行きたい場所に向かう</h3>
        <img src="home_img4.png" class="w-50 h-50">
    </div>

    <div class="container-fluid bg-light text-center py5">
        <h1><span class="badge badge-success ml-5">実際に使ってみよう！！</span></h1>
    </div>

    <!-- 現在地取得 -->
    <script type="text/javascript">
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
    // 成功
    function (pos) {
    var location ="<li>"+"緯度:" + pos.coords.latitude + "</li>";
    location += "<li>"+"経度:" + pos.coords.longitude + "</li>";
    document.getElementById("loc").innerHTML = location;
    document.getElementById("lat").value=pos.coords.latitude;
    document.getElementById("lng").value=pos.coords.longitude;
    },
    // 失敗
    function (pos) {
    var location ="<li>位置情報が取得できませんでした。</li>";
    document.getElementById("loc").innerHTML = location;
    });
    } else {
    window.alert("本ブラウザでは Geolocation が使えません");
    }
    </script>

    <!-- フォーム部分 -->
    <div class="container">
        <form action="./disney_nav.php#here" method="POST">
        <!-- name:<input type="text" name="pname" size="30"> -->
        <div class="form-group">
            <label class="m-3" for="exampleFormControlSelect1">カテゴリー</label>
            <select name="pname" class="form-control ml-3" id="exampleFormControlSelect1">
                <option selected value=0>指定なし</option>
                <option value=1>アトラクション</option>
                <option value=2>ショー・パレード</option>
                <option value=3>グリーティング</option>
                <option value=4>レストラン</option>
                <option value=5>ワゴン</option>
                <option value=6>ショップ</option>
                <option value=7>トイレ</option>
            </select>
        <label class="m-3">あなたの現在地</label>
        <ul class="mb-1" id="loc"></ul>
        <input type="hidden" name="lat" id="lat">
        <input type="hidden" name="lng" id="lng">
        <input class="btn btn-primary ml-3 mt-1 mb-3" type="submit" value="検索！！">
        <!-- <input class="btn btn-primary m-3" type="submit" value="Search!!" id="drop" form="categoryform" class="btn btn-primary" aria-pressed="false" autocomplete="off"> -->
        </form>

        <?php
        if (isset($_POST['lat'])){$lat=$_POST['lat'];}
        if (isset($_POST['lng'])){$lng=$_POST['lng'];}
        if (isset($_POST['pname'])){$pname=$_POST['pname'];}
        if (isset($pname)){
        $dbconn = pg_connect("host=localhost dbname=s20220 user=s20220 password=XXXXXXXX")
        or die('Could not connect: ' . pg_last_error());
        $query="select avg(lat),avg(lon) from spot where cat = ' " .$pname . "';";
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
        $line = pg_fetch_array($result);
        $avglat=$line[1];
        $avglon=$line[0];
        $query="select spot.id, spot.name, category.cname, spot.lat, spot.lon, spot.location, spot.location<->point'($lng,$lat)' as distance from spot, category where spot.cat = category.id and spot.cat = ' " .$pname . "' order by distance OFFSET 0 LIMIT 5;";
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
        echo "<h2 class='ml-3' id='here'>現在地から近いスポット</h2>";
        echo "<table class='table table-striped m-3'>\n";
        while ($line = pg_fetch_array($result)) {
        $point=$line[5];
        $point=str_replace('(','',$point);
        $point=str_replace(')','',$point);
        $outp=preg_split("/[,\s]/",$point);
        echo "<tr>\n";
        // echo "<td>" . $line[1] . "(" . $line[2] .")</td>";
        echo "<td>" . $line[1] . "</td>";
        // echo "<td>$line[4],$line[3],$line[6]</td>";
        // echo "<td>" . $line[2] . "</td>";
        echo "\t\t<td><button class='btn btn-primary' type=\"button\" " .
        "onclick=\"location.href='http://maps.apple.com/maps?q=" .
        "$outp[0],$outp[1]'\">ナビ開始</button></td>\n";
        echo "</tr>\n";
        }
        echo "</table>\n";
        }
        else{echo "<p>no data.</p>";}
        ?>

        <!-- 地図表示 -->
        <div id="map" class="m-3"></div>
        <script type="text/javascript">
        var map = L.map('map', {
        <?php
        echo "center: [$avglat, $avglon],"
        ?>
        zoom: 25,
        });


        // タイルデータ部分
        var tileLayer = L.tileLayer('https://osm.gdl.jp/styles/osm-bright-ja/{z}/{x}/{y}.png', {
        Attribution: '&copy;<a href="http://osm.org/copyright">OpenStreetMap</a> contributors,<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
        });
        tileLayer.addTo(map);


        // 地図にマーカー表示
        <?php
        $query="select spot.id,spot.name,category.cname,spot.lat,spot.lon, spot.location from spot, category where spot.cat = category.id and spot.cat = ' " .$pname . "' OFFSET 0 LIMIT 5;";
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
        while ($line = pg_fetch_array($result)) {
        echo "L.marker([$line[4], $line[3]]).addTo(map).bindPopup('$line[1]'); ";
        }
        ?>
        </script>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
