<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title><?php echo TITLE ; ?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<!-- iPhoneでWebページをアプリっぽく見せる機能 -->
	<meta name="apple-mobile-web-app-capable" content="no">
	<meta name="format-detection" content="telephone=no" />
	<meta name="description" content="ここに紹介文を書く">
	<!-- ファビコン<link rel="apple-touch-icon" href="画像のパス" /> -->
	<link rel="stylesheet" type="text/css" href="/css/base.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script type="text/javascript" src="/js/menu.js"></script>

</head>
<body>
	<?php echo $this->element('Header'); ?>
	<!-- タグ検索結果 -->
	<article class="h1list">
		<div class="h1list-h">
			<h1>「<?php
			foreach($data['Tag'] as $value) {
				echo $value['Tag']['name'] . ', ';
			} 
			?>」のタグ</h1>
			<div>
				<!--p>表示順</p-->
				<p><?php echo $data['count'];?> 件のヒットがありました</p>
			</div>
		</div>
		<!-- ソートのやつ -->
		<!-- <div>
			<ul>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div> -->
		<!-- ソートのやつ終わり -->
		<!-- ここから繰り返す -->
		<?php  foreach($data['LargeHeader'] as $value) : ?>
			<section>
				<a href="/LargeHeader/view/<?php echo $value['LargeHeader']['id']?>"><!-- //該当のh2list.htmlへ -->
					<div>
						<h2><?php echo $value['LargeHeader']['title']?></h2>
						<span>ありがとう <?php echo $value['LargeHeader']['sum']?></span>
					</div>
				</a>
			</section>
		<?php endforeach;?>

		<!-- ここまで繰り返す -->
	</article>
	<!-- タグ検索結果終わり -->
	<div class="page-top">
		<a href="#TOP"><p>トップに戻る</p></a>
	</div>
	<!-- ナビの時の霞ませるレイヤー -->
	<div class="model"></div>
	<!-- ナビの時の霞ませるレイヤー終わり -->
</body>
</html>