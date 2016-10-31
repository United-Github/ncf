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
<?php echo $this->element('header');?>
	<!-- 固定ヘッダー分の空白終わり -->
	<!-- タグ一覧へ -->
	<div class="tagp-link">
		<a href="/TagList/"><p>タグ一覧</p></a>
	</div>
	<!-- タグ一覧へ終わり -->
	<main>
	<!-- 有用な記事ランダム表示 -->
		<article class="useful-random">
			<h1>役立つページ</h1>
			<?php
			$count = 0;
			foreach($data['largeHeader'] as $value) :
				if($count > 3) break; 
			?>
			<a href="/LargeHeader/view/<?php echo $value['LargeHeader']['id'] ?>"><!-- //該当のh1list.htmlへ -->
					<div class="random-article">
						<h2><?php echo $value['LargeHeader']['title'];?></h2>
						<span>ありがとう <?php echo $value['LargeHeader']['sum'];?></span>
					</div>
				</a>
			<?php
			endforeach;
			?>
		</article>
		<!-- 有用な記事ランダム表示終わり -->
		<!-- 新着リクエスト -->
		<article class="new-request-list">
			<h1>新着リクエスト</h1>
			<?php
			foreach($data['request'] as $value):
			?>
				<a href=""><!-- //該当のリクエストページへ -->
					<div class="new-request">
						<h2><?php echo $value['Request']['title']?></h2>
						<span><?php echo date('Y年m月d日', strtotime($value['Request']['created']));?></span>
					</div>
				</a>
			<?php
			endforeach;
			?>
			<!--section>
				<div class="new-request">
					<h2>タイトル１</h2>
				</div>
			</section>
			<section>
				<div class="new-request">
					<h2>タイトル２</h2>
				</div>
			</section>
			<section>
				<div class="new-request">
					<h2>タイトル３</h2>
				</div>
			</section>
			<section>
				<div class="new-request">
					<h2>タイトル４</h2>
				</div>
			</section>
			<section>
				<div class="new-request">
					<h2>タイトル５</h2>
				</div>
			</section>
			<div class="request-list-link">
				<a href=""><p>リクエスト一覧へ</p></a>
			</div-->
		</article>
		<!-- 新着リクエスト終わり -->
	</main>
	<div class="page-top">
		<a href="#TOP"><p>トップに戻る</p></a>
	</div>
	<!-- ナビの時の霞ませるレイヤー -->
	<div class="model"></div>
	<!-- ナビの時の霞ませるレイヤー終わり -->
</body>
</html>