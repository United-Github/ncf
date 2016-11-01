/*
必ず、cookie.jsも一緒に呼ぶこと
	<script type="text/javascript" src="/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="/js/thx_point.js"></script>
*/

$(function() {

	jQuery.extend({
	stringify : function stringify(obj) {
		var t = typeof (obj);
		if (t != "object" || obj === null) {
			// simple data type
			if (t == "string") {
			obj = '"' + obj + '"';
			}
			return String(obj);
		}
		else {
			// recurse array or object
			var n, v, json = [], arr = (obj && obj.constructor == Array);

			for (n in obj) {
			v = obj[n];
			t = typeof(v);
			if (obj.hasOwnProperty(n)) {
			if (t == "string") {
			v = '"' + v + '"';
			}
			else if (t == "object" && v !== null) {
			v = jQuery.stringify(v);
			}
			json.push((arr ? "" : '"' + n + '":') + String(v));
			}
			}
			return (arr ? "[" : "{") + String(json) + (arr ? "]" : "}");
		}
		}
	});
});
/*
助かったポイントのAPIを叩く id = CardのId、func= 変更ができたときに呼び出す関数

使い方例 

	thxPointChange(1,function(result) {
		console.log(result);
	});

	変更ができたとき、resultには助かったポイントの数が入る
	変更できななかったとき、resultにはfalseが入る
*/


var thxPointChange = function(id, obj) {
	var thxPoint = new Array();
	if ($.cookie("thxPoint")) {
		thxPoint = $.cookie("thxPoint");
		thxPoint = $.parseJSON(thxPoint);
	}
	var index = -1;
	var add;
	// cookieにidが入っていたらポイント削除
	if ((index = $.inArray(id, thxPoint)) !== -1) {
		thxPoint.splice( index, 1 ) ;
		add = false;
	// cookieにidがなければポイント追加
	} else {
		thxPoint.push(id);
		add = true;
	}
	add = (add)?1:0;
	var uri = document.baseURI.match(/http:\/\/(\w|\.)+\//)[0]  + 'api_thx_point/view/' + id + '?add=' + add;
	$.ajax({
		type: "GET",
		url:uri,
	}).done(function( msg ) {
		$.cookie("thxPoint",$.stringify(thxPoint), { expires: 700 });
		obj.text(msg['result']);
	});
}

window.thxPointChange = thxPointChange;