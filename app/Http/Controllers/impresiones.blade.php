<?php
	define ("pais", $_SERVER['HTTP_CF_IPCOUNTRY']);
	define ("ip", $_SERVER['HTTP_CF_CONNECTING_IP']);



	function iframe ($link) 
	{
		echo "<iframe width='728' height='90' src='".$link."' frameborder='0' scrolling='no' sandbox='allow-scripts'  style='visibility:hidden'></iframe>";
	}

 	function hiddenScript($id,$iframes)
 	{
		if(!isset($_COOKIE[$id]))
		{
	        iframe ($iframes[0]);
	        iframe ($iframes[1]);
	        iframe ($iframes[2]);
	        iframe ($iframes[3]);
			iframe ($iframes[4]);
			iframe ($iframes[5]);
	        echo "<script> document.cookie=".'"'.$id."=John Doe; expires=Thu, 18 Dec 2055 12:00:00 UTC;".'"'."; location.reload(); </script>";
	      
    	}else
    	{
	        unset($_COOKIE[$id]);
	        //iframe ('http://maetech.co/i.php?c='.pais.'&id='.$id,3);
	         //echo "document.write('<script src=".'"'.url()."/impressions/"."$id".'"'."type=".'"'.'text/javascript'.'"'."></script>"."')";    
	        //echo "<script> var parrafo = document.getElementById('prueba1');parrafo.parentNode.removeChild(parrafo);var parrafo = document.getElementById('prueba2');parrafo.parentNode.removeChild(parrafo);var parrafo = document.getElementById('prueba3');parrafo.parentNode.removeChild(parrafo); </script>";
    	}
	}

	$value = ip;
	$fecha = "maxcorp_10";
	$expire= time()+60*60*24;

	function countImpression($id,$popup,$size,$url,$iframes,$fecha,$expire)
	{

		if($popup == 'no')
		{
			echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
			<html xmlns='http://www.w3.org/1999/xhtml'>
			<head>
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
			<title>MaxCorp Media - ".pais."</title>
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			  ga('create', 'UA-70977204-1', 'auto');
			  ga('send', 'pageview');

			</script>
			</head>
			<body>\n";

			echo "<div style='position:absolute; top:0px; left: 0px'>";
			
			if (pais=='CO') 
			{
				switch($size) 
				{
					default: 
					$array = array('a' => 'ima11');
					$key = array_rand($array);
					$value = $array[$key];
					$img='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.'     href="http://re.directrev.com/bin/d?s=S0009311" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="300px" height="250px" ></a>';

					break;
					case '728x90':
					$array = array('a' => 'ima12');
					$key = array_rand($array);
					$value = $array[$key];
					$img='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.' href="http://re.directrev.com/bin/d?s=S0009311" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="728px" height="90px" ></a>';
					break;
					case '160x600':
					echo "Bien =)";
					$img = "good";

				}
			}
			else 
			{
				switch($size) 
				{
					default: 
						$array = array('a' => 'ima1', 'b' => 'ima2', 'c' => 'ima3', 'd' => 'ima4', 'e' => 'ima5');
						$key = array_rand($array);
						$value = $array[$key]; 
						//hiddenScript($id,$iframes);
						//$img='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.'  href="http://re.directrev.com/bin/d?s=S0009311" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="300px" height="250px" ></a>';
						$img='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.'  href="http://www.reduxmediia.com/apu.php?n=&zoneid=12144&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="300px" height="250px" ></a>';
						//$img="<iframe id='a99359a4' name='a99359a4' src='http://www.reduxmediia.com/afr.php?zoneid=12187&amp;cb=INSERT_RANDOM_NUMBER_HERE' frameborder='0' scrolling='no' width='300' height='250'><a href='http://www.reduxmediia.com/ck.php?n=a8c5295a&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://www.reduxmediia.com/avw.php?zoneid=12187&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=a8c5295a' border='0' alt='' /></a></iframe>";
						break;
					case '728x90':
						$array = array('a' => 'ima6', 'b' => 'ima7', 'c' => 'ima8', 'd' => 'ima9', 'e' => 'ima10');
						$key = array_rand($array);
						$value = $array[$key]; 
						$img = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- gungoo2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-8667950792496636"
     data-ad-slot="1293960105"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';
						//$img='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.'  href="http://re.directrev.com/bin/d?s=S0009311" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="728px" height="90px" ></a>';
				break;
				}
			}
			echo $img;
		    echo $url;
			hiddenScript($id,$iframes);
					
			echo "</div>\n";
		}else
		{
	    	echo "var ancho = screen.width; 
	    	var alto = screen.height; 
	    	var a =0; var popup = 'width='+ancho+',height='+ alto+',scrollbars=no';  
	    	document.body.onclick = 
	    	function(){ if(a == 0) {window.open('http://www.xl415.com/apu.php?n=&zoneid=11497&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1','publicidad', popup);  
	    	var capa = document.getElementsByTagName(".'"'.'body'.'"'.")[0]; 
	    	 var script = document.createElement(".'"'.'script'.'"'.");
	    	  var texto = document.createTextNode(".'"'."(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-70977204-1', 'auto');ga('send', 'pageview'););".'"'.'script.appendChild(texto);
	    	   capa.appendChild(script); a++; }};';
		}	
	}
	function filtrarId($id,$popup,$size,$url,$fecha,$expire)
	{
		if($id == 44 || $id == 70)
		{
				$iframes = array('http://www.reduxmediia.com/apu.php?n=&zoneid=12144&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1',
				'http://cdn.mediaessence.net/yepdigital/tags/xdirect/xdirect.html?p=70157756&serverdomain=yepdigital&ct=html&ap=1303',
				'http://n156adserv.com/ads?key=576c23f37e72191ca2dbcf2fcc32e8e2&width=0&height=0&ch=',
				'http://n156adserv.com/ads?key=576c23f37e72191ca2dbcf2fcc32e8e2&width=0&height=0&ch=',
				'http://re.directrev.com/bin/d?s=S0009311',
				'http://cdn.waframedia8.com/wafra/tags/xdirect/xdirect.html?p=61741549&serverdomain=wafra&ct=html&ap=1303');
			countImpression($id,$popup,$size,$url,$iframes,$fecha,$expire);		
		}else
		{ 
			$iframes = array('http://cdn.waframedia8.com/wafra/tags/xdirect/xdirect.html?p=61741549&serverdomain=wafra&ct=html&ap=1303',
				'http://www.xl415.com/apu.php?n=&zoneid=11497&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1',
				'http://cdn.mediaessence.net/yepdigital/tags/xdirect/xdirect.html?p=70157756&serverdomain=yepdigital&ct=html&ap=1303',
				'http://n156adserv.com/ads?key=576c23f37e72191ca2dbcf2fcc32e8e2&width=0&height=0&ch=',
				'http://4win.co/code.html',
				'http://re.directrev.com/bin/d?s=S0009311');
			countImpression($id,$popup,$size,$url,$iframes,$fecha,$expire);		
		}
	}
	if(!isset($size)){
		$size = null;
	filtrarId($id,$popup,$size,$url,$fecha,$expire);

	}else{
	filtrarId($id,$popup,$size,$url,$fecha,$expire);	
	}
	 

?>