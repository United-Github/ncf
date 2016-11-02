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
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/menu.js"></script>

</head>
<body>
	<?php echo $this->element('Header'); ?>
	<pre>
	<?php //var_dump($data['LargeHeader']) ?>
	</pre>
	<!-- タグ検索結果 -->
	<article class="h2list">
		<div class="h2list-h">
			<div class="h2list-h1">
				<h1><?php echo $data['LargeHeader']['title']?></h1> <!-- ここはその小見出しの大見出しを表示 -->
			</div>
		</div>
		<?php foreach($data['SmallHeader'] as $smallHeader) :?>
			<div class="h2list-h">
				<div class="h2list-h2">
					<h1><?php echo $smallHeader['SmallHeader']['title'];?></h1> <!-- ここはひとつ前でクリックした小見出しを表示 -->
				</div>
			</div>
			<a href="/Card/view/<?php echo $smallHeader['SmallHeader']['id'];?>"><!-- //該当のcardlist.htmlへ -->
			<?php foreach($smallHeader['SmallHeader']['Card'] as $card) : ?>
			<section>
					<div>
						<h2><?php echo $card['Card']['title'];?></h2>
						<span>ありがとう <?php echo $card['Card']['thx_point'];?></span>
						<div class="arrow2"></div>
					</div>
			</section>
			<?php endforeach; ?>
			</a>
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