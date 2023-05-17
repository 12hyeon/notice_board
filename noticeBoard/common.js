$(document).ready(function(){
	$(".dat_edit_bt").click(function(){
		/* dat_edit_bt클래스 클릭시 동작(댓글 수정) */
		var obj = $(this).closest(".dap_lo").find(".dat_edit");
		obj.dialog({
			modal:true,
			width:650,
			height:200,
			title:"댓글 수정"});
		});

	$(".dat_delete_bt").click(function(){
		/* dat_delete_bt클래스 클릭시 동작(댓글 삭제) */
		var obj = $(this).closest(".dap_lo").find(".dat_delete");
		obj.dialog({
			modal:true,
			width:400,
			title:"댓글 삭제확인"});
		});

	$(".bor_edit_bt").click(function(){
		var obj = $(this).closest(".bo_ser").find(".bor_edit");
		obj.dialog({
			modal:true,
			width:400,
			title:"게시글 수정"});
	    });

	$(".bor_del_bt").click(function(){
		var obj = $(this).closest(".bo_ser").find(".bor_delete");
		obj.dialog({
			modal:true,
			width:400,
			title:"게시글 삭제"});
		});
	});