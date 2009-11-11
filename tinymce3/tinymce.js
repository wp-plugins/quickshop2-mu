function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}

function insertQSLink() {
	
	var tagtext;
	
	var quickshop = document.getElementById('quickshop_panel');
	
	// who is active ?
	if (quickshop.className.indexOf('current') != -1) {
		var product = document.getElementById('product').value;
		var price = document.getElementById('price').value;
		var shipping = document.getElementById('shipping').value;
		var shipping2 = document.getElementById('shipping2').value;
		if ((product != '') || (price != '') )
			tagtext = "[quickshop:"+ product + ":price:" + price + ":shipping:" + shipping + ":shipping2:" + shipping2 + ":end]";
		else
			tinyMCEPopup.close();
	}
	
	if(window.tinyMCE) {
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
		//Peforms a clean up of the current editor HTML. 
		//tinyMCEPopup.editor.execCommand('mceCleanup');
		//Repaints the editor. Sometimes the browser has graphic glitches. 
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
	

}
