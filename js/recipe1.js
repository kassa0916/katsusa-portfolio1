// $(function(){

// 	//セレクトボックスが切り替わったら発動
// 	$('select').change(function(){

// 		//選択したvalueを変数に格納
// 		var val=$(this).val();

// 		//選択したvalue値をli要素に出力
// 		$('span').text(val);
// 	});
// });

$("#people").change(function(){
	var r = $('option:selected').val();

	console.log(r);
})