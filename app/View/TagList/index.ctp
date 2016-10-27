<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>サイト名</title>
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
<?php echo $this->element('header');?>
	<aside class="tag-search">
		<section>
			<div>
				<input type="search"></input>
			</div>
		</section>
	</aside>
	<main class="taglist">
		<!-- ここから繰り返す -->
		<?php foreach($data as $value) : ?>
			<section>
				<a href="h1list.html"><!-- 該当のh1list.htmlへ -->
					<div>
						<p><?php echo $value['Tag']['name']?></p>
					</div>
				</a>
			</section>
		<?php endforeach;?>
		<!-- ここまで繰り返す -->
	</main>
	<!-- タグ検索結果終わり -->
	<div class="page-top">
		<a href="#TOP"><p>トップに戻る</p></a>
	</div>
	<!-- ナビの時の霞ませるレイヤー -->
	<div class="model"></div>
	<!-- ナビの時の霞ませるレイヤー終わり -->
</body>
</html>