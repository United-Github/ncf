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
	<script type="text/javascript">
		$(function(){
			$('.js_tag').on('click', function(){
				var tag_id_obj = $(this).find('.js_tag_id');
				var tag_id = tag_id_obj.data('id');
				var name = tag_id_obj.text();

				if (!tag_id_obj.hasClass('js_done')) {
					tag_id_obj.addClass('js_done');
					$('form').append('<input type="hidden" name="data[tag][]" value="'+ tag_id + '" data-name="' + name + '"/>');
				} else {
					tag_id_obj.removeClass('js_done');
					$('form').find('input').each(function(){
						if($(this).val() == tag_id){
							$(this).remove();
						}
					});
				}
				var search_tag = '';
				$('form').find('input').each(function(){
					var name = $(this).data('name');
					search_tag += name + ', ';
				})
				$('.js_input').val(search_tag);
			});
			$('.js_submit').on('click', function(){
				$('form').submit();
			});
		})
	</script>

</head>
<body>
<?php echo $this->element('header');?>
	<aside class="tag-search">
		<section>
			<div>
				<input type="search" placeholder="タグをクリックして選んでください" class="js_input"></input>
			</div>
		</section>
		<button class="js_submit">検索</button>
	</aside>
	<main class="taglist">
		<!-- ここから繰り返す -->
		<?php foreach($data as $value) : ?>
			<section>
				<a class="js_tag"><!-- 該当のh1list.htmlへ -->
					<div>
						<p class="js_tag_id" data-id="<?php echo $value['Tag']['id']?>"><?php echo $value['Tag']['name']?></p>
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
	<form method="post" action="/LargeHeader/index/">
	</form>
</body>
</html>