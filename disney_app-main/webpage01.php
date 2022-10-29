<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>webpage01</title>
</head>
<body>
    <form id="categoryform" action="./webpage01.php" method="POST">
        <!--メインカテゴリー選択-->
        <div class="form-group">
            <!--<label for="exampleFormControlSelect1">メインカテゴリー</label>
            <select name="選択肢" class="form-control" id="exampleFormControlSelect1">
                <option selected value="指定なし">指定なし</option>
                <option value="伝統工芸品">伝統工芸品</option>
                <option value="2">伝統芸能</option>
                <option value="3">日本の行事</option>
                <option value="4">諸芸</option>
                <option value="5">食</option>
                <option value="6">和楽器</option>
                <option value="7">その他の伝統文化</option>
                <option value="8">観光</option>
            </select>-->
            <label for="exampleFormControlSelect1">カテゴリー</label>
            <select name="選択肢" class="form-control" id="exampleFormControlSelect1">
                <option selected value="指定なし">指定なし</option>
                <option value="1">アトラクション</option>
                <option value="2">ショー・パレード</option>
                <option value="3">グリーティング</option>
                <option value="4">レストラン</option>
                <option value="5">ワゴン</option>
                <option value="6">ショップ</option>
                <option value="7">トイレ</option>
            </select>
        <!-- </div> -->
        <!-- サブカテゴリー選択
        <div class="form-group">
            <label for="exampleFormControlSelect1">サブカテゴリー</label>
            <select class="form-control" id="exampleFormControlSelect1">
                <option selected value="0">指定なし</option>
                <option value="1">織物</option>
                <option value="2">染色品</option>
                <option value="3">その他の繊維製品</option>
                <option value="4">陶磁器</option>
                <option value="5">漆器</option>
                <option value="6">木工品・竹工品</option>
                <option value="7">金工品</option>
                <option value="8">仏壇・仏具</option>
                <option value="9">和紙</option>
                <option value="10">文具</option>
                <option value="11">石工品</option>
                <option value="12">貴石細工</option>
                <option value="13">人形・こけし</option>
                <option value="14">その他の工芸品</option>
                <option value="15">工芸材料・工芸用具</option>
            </select>
        </div> -->
        <!--検索ボタン-->
        <input type="submit" value="Search!!" id="drop" form="categoryform" class="btn btn-primary" aria-pressed="false" autocomplete="off">
        </div>
    </form>

    <?php
    echo htmlspecialchars($_POST['選択肢']);
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
