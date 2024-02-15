jQuery(document).ready(function(){

	jQuery('.ocdi__gl-item-footer button').click(function(){
		jQuery('.ui-dialog-buttonset .button-primary').addClass('import-btn-enable');
		jQuery('.ocdi__demo-import-notice').append('<p click="bakery-terma-text"><input type="checkbox" id="bakery-terms" onclick="enableButton()" value="no">Your current data may loss. do you want to continue?</p>');
	});

});
function enableButton(){

	if(jQuery('#bakery-terms').val()=="no") {
		jQuery('.ui-dialog-buttonset .button-primary').removeClass('import-btn-enable');
		jQuery('#bakery-terms').val("yes");
	}else{
		jQuery('.ui-dialog-buttonset .button-primary').addClass('import-btn-enable');
		jQuery('#bakery-terms').val("no");
	}
}