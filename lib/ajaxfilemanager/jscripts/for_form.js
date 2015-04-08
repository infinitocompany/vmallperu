function selectFile(url)
{
	  //$("div.cke_dialog input:first", window.opener.document).val(url);
      window.opener.document.getElementById(elementId).value = url;
      window.close() ;
 

}



function cancelSelectFile()
{
  // close popup window
  window.close() ;
}

