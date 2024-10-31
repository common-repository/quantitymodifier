jQuery( document ).ready( function()
{ 
	console.log('im in...');
	jQuery('.qtyMdfr').on('click',function(){
		var current_qty = parseInt(jQuery('.qty').val());
		var mdfr_qty = parseInt(jQuery(this).attr('value'));
		console.log(current_qty);
		console.log(mdfr_qty);
		var new_qty = current_qty + mdfr_qty;
		jQuery('.qty').val(new_qty);
		return false;
	});

});