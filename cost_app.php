<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>家計簿わんこだワン！ツー！?</title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
    @media screen and (max-width: 480px){
      html {
        font-size: 20px;
        background-color: #87cefa;
      }
      p {
        margin: 0px;
      }
      .btn {
        text-align: center;
      }
      .btn_sub {
        padding: 10px 25px;
        border-radius: 10px;
        font-weight: bold;
      }
      div button {
        padding: 10px 25px;
        border-radius: 10px;
        font-weight: bold;
        margin-left: 5px;
        margin-bottom: 10px;
      }
      img {
        width: 100%;
        text-align: center;
      }
      span {
        margin-left: 15px;
      }
      .record_data {
        border: 1px solid black;
        margin: 10px 5px;
        border-radius: 5px;
      }
      div form {
        display: inline-block;
        margin-left: 5px;
      }
      .ml {
        margin-left: 5px;
      }
    }
  </style>
</head>
<body>
  <div class="header">
    <a href="/cost_app.php"><button type="button">記録する</button></a>
    <a href="/record_list.php"><button type="button">記録確認</button></a>
    <a href="#" id="btn"><button type="button">終了する</button></a>
  </div>
  <?php 
  $date = "";
  $name = "";
  $value;
  $info = "";
  $N1 = "";
  $N2 = "";
  $id;
  $sub_name = "記録";
  if(!empty($_POST)){
    $sub_name = "更新";
    $id = $_POST["id"];
    $db = new pdo("mysql:host=localhost;dbname=mydb","root","sass1200");
    $sql1 = "select * from record where id = ".$id;
    $result = $db->query($sql1);
    while($r = $result->fetch()){
      $date = $r[1];
      $name = $r[2];
      $value = $r[3];
      $info = $r[4];
      if($name === "のあ"){
        $N1 = "checked";
        $N2 = "";
      }else{
        $N1 = "";
        $N2 = "checked";
      }
    }
  }
//  $date = "2020-09-10";
//  $name = "のあ";
//  $value = 100;
//  $info = "test";
  ?>
  <form method="post" action="post_record.php" name="form1">
    <p>日付：<input type="date" name="date" class="check1" value="<?php print $date ?>"></p>
    <p>
      名前：
      <input type="radio" name="name" value="のあ" id="noa" class="check1" <?php print $N1 ?>>
      <label for="noa">のあ</label>
      <input type="radio" name="name" value="こと" id="kotone" class="check1" <?php print $N2 ?>>
      <label for="kotone">こと</label>
    </p>
    <p>金額：￥<input type="number" pattern="\d*" name="value" class="check1" value="<?php print $value ?>"></p>
    <p>
      説明：<br>
      <textarea name="info" rows="4" cols="40" class="check1" ><?php print $info ?></textarea>
    </p>
    <p class="btn"><input type="submit" value="<?php print $sub_name ?>" class="btn_sub" id="submit1" disabled name="sub_name"></p>
    <p><input type="hidden" value="<?php print $id ?>" name="id"></p>
  </form>
  <script>
    'use strict';
    var form1 = document.forms.form1;
    var Input1 = document.querySelector('input#submit1');
    Input1.disabled = true;
    
    form1.addEventListener('click', function() {
      var a1 = document.getElementsByClassName('check1');
      var count1 = 0;
      for (var num = 0; a1.length > num; num++) {
        
        if(!(a1[num].value === "")){
          console.log(a1[num].value);
          count1 += 1;
        }
      if (count1 > 4) {
        Input1.disabled = false;
      } else {
        Input1.disabled = true;
      }
      }
    });
  </script>
</body>
</html>