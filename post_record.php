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
  $db = new pdo("mysql:host=localhost;dbname=mydb","root","sass1200");
  if($db){
//    print "接続成功<br>";
  }else{
//    print "接続失敗<br>";
  }
  $date = "";
  $name = "";
  $value = 0;
  $info = "";
  $sub_name = "";
  $id;
  if(!empty($_POST)){
    $date = $_POST["date"];
    $name = $_POST["name"];
    $value = $_POST["value"];
    $info = $_POST["info"];
    $sub_name = $_POST["sub_name"];
    $id = $_POST["id"];
  }
  $sql1 = "";
  if($sub_name === "記録"){
    $sql1 = "insert into record value (0,'".$date."','".$name."',".$value.",'".$info."')";
  }else if($sub_name === "更新"){
    $sql1 = "update record set date='{$date}' ,name='{$name}' ,value={$value} ,info='{$info}' where id={$id}";
//    print $sql1;
  }
  
  $result = $db->query($sql1);
  if($result){
//    print "<p>記録成功</p><br>";
    print '<img src="image01.png" alt="thank_you">';
  }else{
//    print "<p>記録失敗</p><br>";
    print '<img src="image03.png" alt="warring">';
  }
  ?>
  <script>
    'use strict';
    var btn = document.getElementById('btn');
    btn.addEventListener('click',function(){
      window.close();
    },false);
  </script>
</body>

</html>
