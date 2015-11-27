<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <?php
  if(isset($cssLink )){
    foreach($cssLink as $link){
      echo '<link rel="stylesheet" type="text/css" href="css/' . $link . '" media="all">';
    }
  }
  ?>
  <title>管理者ページ | <?php echo $title; ?></title>
  <?php
  if(isset($scriptSource)){
    foreach ($scriptSource as $source) {
      echo '<script src="' . $source . '"></script>';
    }
  }
  ?>
</head>
<body>
  <header>
    <h2><a href="admin.php">管理者ページ</a></h2>
    <nav>
      <ul>
        <li><a href="admin_direct_mail.php">ダイレクトメール設定</a></li>
        <li><a href="admin_event.php">イベント情報登録</a></li>
        <li><a href="#">アカウント情報</a></li>
        <li><a href="admin_product_manager.php">商品管理</a></li>
        <li><a href="#">在庫情報</a></li>
        <li><a href="#">売り上げ情報</a></li>
        <li><a href="./index.php">お客様TOPへ</a></li>
      </ul>
    </nav>
  </header>
  <div id="sidebar">
    <nav>
      <ul>
        <?php
        if(isset($sideElement) && isset($sideElementLink)){
          for($i=0; $i < count($sideElement); $i++){
            echo '<li><a href="' . $sideElementLink[$i] . '">' . $sideElement[$i] . '</a></li>';
          }
        }
        ?>
      </ul>
    </nav>
  </div>
  <main>
    <h2><?php echo $subtitle; ?></h2>
