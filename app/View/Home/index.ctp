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
	<header>アプリ名
		<!-- メニューボタン -->
		<div class="gnav-btn">
			<div class="icon-animation">
				<span class="top"></span>
				<span class="middle"></span>
				<span class="bottom"></span>
			</div>
		</div>
		<!-- メニューボタン終わり -->
	</header>
	<nav class="global">
		<!-- メニュー内 -->
		<ul class="gnav">
			<li>メニュー</li>
			<li><a href="index.html">トップ</a></li>
			<li><a href="">タグ一覧</a></li>
			<li><a href="">リクエスト</a></li>
			<li><a href="">ユーザページ</a></li>
		</ul>
		<!-- メニュー内終わり -->
	</nav>
	<!-- 固定ヘッダー分の空白 -->
	<div class="space"></div>
	<!-- 固定ヘッダー分の空白終わり -->
	<!-- タグ一覧へ -->
	<div class="tagp-link">
		<a href=""><p>タグ一覧</p></a>
	</div>
	<!-- タグ一覧へ終わり -->
	<main>
	<!-- 有用な記事ランダム表示 -->
		<article class="useful-random">
			<h1>役立つページ</h1>
			<section>
				<div class="random-article">
					<h2><?php echo 'タイトルだよ＝－－－';?></h2>
				</div>
			</section>
			<section>
				<div class="random-article">
					<h2>タイトル２</h2>
				</div>
			</section>
			<section>
				<div class="random-article">
					<h2>タイトル３</h2>
				</div>
			</section>
			<div class="morelook">
				<a href=""><p>もっと見る</p></a>
			</div>
		</article>
		<!-- 有用な記事ランダム表示終わり -->
		<!-- 新着リクエスト -->
		<article class="new-request-list">
			<h1>新着リクエスト</h1>
			<section>
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
			</div>
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