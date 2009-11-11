function init()
{
	tinyMCEPopup.resizeToInnerSize();
}

function insertQSLink()
{
	var tagtext;
	var quickshop = document.getElementById('quickshop_panel');

	if (quickshop.className.indexOf('current') != -1)
	{
		var product = document.getElementById('product').value;
	
		if ( product )
		{
			tagtext = '[quickshop product="' + product + '"]';
		}
		else
		{
			tinyMCEPopup.close();
		}
	}

	if ( window.tinyMCE )
	{
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
		
		tinyMCEPopup.editor.execCommand('mceRepaint');
		
		tinyMCEPopup.close();
	}
	
	return;
}
