<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title><?php echo TITLE;?></title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<!-- iPhoneでWebページをアプリっぽく見せる機能 -->
	<meta name="apple-mobile-web-app-capable" content="no">
	<meta name="format-detection" content="telephone=no" />
	<meta name="description" content="ここに紹介文を書く">
	<!-- ファビコン<link rel="apple-touch-icon" href="画像のパス" /> -->
	<link rel="stylesheet" type="text/css" href="/css/base.css">
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/menu.js"></script>
	<script type="text/javascript" src="/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="/js/thx_point.js"></script>
	<script type="text/javascript">
		$(function(){
			$('.js_thx').on('click', function(){
				
				thxPointChange($(this).data('id'), $(this).parent().find('.js_thx_point'));
			});
		});
	</script>
</head>
<body>
	<?php echo $this->element('Header'); ?>
	<article class="cardlist">
		<div class="cardlist-h">
			<a href="h2list.html"><!-- 該当のh2list.htmlへ -->
				<div class="cardlist-h2">
					<h1><?php echo $data['SmallHeader']['title'];?></h1> <!-- ここはひとつ前でクリックした小見出しを表示 -->
				</div>
			</a>
		</div>
		<!-- ここから繰り返す -->
		<?php foreach($data['Card'] as $card) :?>
		<section>
			<div>
				<h2><?php echo $card['Card']['title'];?></h2>
				<?php foreach($card['CardContent'] as $cardContent): ?>
					<img src="/img/content/<?php echo $cardContent['file_name'];?>">
				<?php endforeach;?>
				<p><?php echo $card['Card']['content'];?></p>
				<p>
				ありがとう 
				<span class="js_thx_point">
				<?php echo $card['Card']['thx_point'];?>
				</span>
				<button type="button" class="js_thx" data-id="<?php echo $card['Card']['id']?>">Thanks</button><!-- 助かったボタン -->
				</p>
				<pre>
				<?php //var_dump($card['Card']); break;?>
				</pre>

				<!--a href=""><span>Twitter</span></a-->
				<!--a href=""><span>FaceBook</span></a-->
				<!-- 他にシェアした方がいいやつあればお願いします -->
			</div>
		</section>
		<?php endforeach; ?>
		<!-- ここまで繰り返す -->
	</article>
	<div class="page-top">
		<a href="#TOP"><p>トップに戻る</p></a>
	</div>
	<!-- ナビの時の霞ませるレイヤー -->
	<div class="model"></div>
	<!-- ナビの時の霞ませるレイヤー終わり -->
</body>
</html>