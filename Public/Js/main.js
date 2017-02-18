$(document).ready(function(){
	// $(".menulist").click(function(){
		// $(".menulist").removeClass("current");
		// $(this).addClass("current");

	// });
		//实现点击导航栏时保持当前状态
		$('.menulist').each(function(){
			$this=$(this);
			if($this[0].href==String(window.location)){
				$this.addClass('current');
			}
		});

		$('.table tr:even').css('background-color','#FFF');

		$('.select_all').click(function(){
			$("input[name='check[]']").prop('checked',this.checked);
		});
});
//Article_singleArticle.html点击回复按钮显示回复框
function recomment(obj){
	var id=$('.innercomment'+obj).attr('id');
	//$("#"+id).css('display','block');
	//$('#'+id).hide();
	$('#'+id).slideToggle('fast');
}
// function innerrecomment(obj){
// 	$('.innerrecomments').css('display','block');
// }
// function close(){
// 	alert('12');
// 	//$('.innercomment'+obj).css('display','none');
// }