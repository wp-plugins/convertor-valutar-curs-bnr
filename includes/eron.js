
	jQuery(document).ready(function()
	{
		var banca = jQuery(".banca").val();
		var from = jQuery(".din").val();
		var to = jQuery(".in").val();
		
		getValute(banca, from, to);
		
		jQuery(".din").change(function()
		{
			var dinVal = jQuery(this).val();
			var inVal = jQuery(".in").val();
			
			if(dinVal == "EURO")
			{
				jQuery(".in").val("RON");
				inVal = "RON";
			}
			else
			{
				jQuery(".in").val("EURO");
				inVal = "EURO";
			}
			
			getValute(jQuery(".banca").val(), dinVal, inVal);
			
			if(jQuery("#valoare").length > 0)
			{
				convert();
			}
		});
		
		jQuery(".in").change(function()
		{
			var inVal = jQuery(this).val();
			var dinVal = jQuery(".din").val();
			
			if(inVal == "EURO")
			{
				jQuery(".din").val("RON");
				dinVal = "RON";
			}
			else
			{
				jQuery(".din").val("EURO");
				dinVal = "EURO";
			}
			
			getValute(jQuery(".banca").val(), dinVal, inVal);
			
			if(jQuery("#valoare").length > 0)
			{
				convert();
			}
		});
		
		jQuery(".banca").change(function(event)
		{
			var banca = jQuery(".banca").val();
			var from = jQuery(".din").val();
			var to = jQuery(".in").val();
			
			getValute(banca, from, to);
			
			
			if(jQuery("#valoare").length > 0)
			{
				convert();
			}
		});
		
		jQuery("#valoare").keyup(function(event)
		{
			convert();
		});
	});
	
	function getValute(banca, from, to)
	{
		jQuery.get( "../wp-content/plugins/eron/convertor.php?act=banca&banca="+banca+"&from="+from+"&to="+to, function( data )
		{
			jQuery("#curs").val(data);
		});
	}
	
	function convert()
	{
		var banca = jQuery(".banca").val();
		var from = jQuery(".din").val();
		var to = jQuery(".in").val();
			
		jQuery.get( "../wp-content/plugins/eron/convertor.php?act=convert&banca="+banca+"&from="+from+"&to="+to+"&valoare="+jQuery("#valoare").val(), function( data )
		{
			jQuery("#rezultat").val(data);
		});
	}