<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>count</title>
	<script src="{{ asset('js/maxmedia/jquery-1.11.3.min.js') }}"></script>
</head>
<body>

</body>
</html>

<?php


	define ("pais", $_SERVER['HTTP_CF_IPCOUNTRY']);
	define ("ip", $_SERVER['HTTP_CF_CONNECTING_IP']);



	function iframe ($link,$i) 
	{
		echo "<iframe width='728' height='90' id ='prueba".$i."'  src='".$link."' frameborder='0' scrolling='no' sandbox='allow-scripts'  style='visibility:hidden'></iframe>";
	}

 	function hiddenScript($id,$iframes)
 	{
 
if(!isset($_COOKIE[$id]))

  {		
		foreach ($iframes as $key => $value) {
			iframe ($value,$key);
		}
	  
   echo "<script> document.cookie=".'"'.$id."=John Doe; expires=Thu, 18 Dec 2055 12:00:00 UTC;".'"'.";   alert('hola');</script>";
  	}else
   	{
	  	unset($_COOKIE[$id]);
	 	//echo "<script>location.reload();</script>";
	  	// echo "<script> document.cookie=".'"'.$id."=John Doe; expires=Thu, 18 Dec 2055 12:00:00 UTC;".'"'."; location.reload(); </script>";
	   	//$i = 0;
	  	//echo "<script> $(document).ready(function(){ alert(".'"'.'hola'.'"'.");});</script>";
	  	//	$i++;
	 	//\Illuminate\Support\Facades\Session::put('prueba',$i);
	  	//			echo \Illuminate\Support\Facades\Session::get('prueba');
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
			  ga('create', 'UA-70977204-1', 'auto');".'ga('."'".'set'."'".', '."'".'page'."'".', '."'"."/imp/$id"."'".');'.'ga('."'".'send'."'".', '."'".'pageview'."'".');'."</script></head><body>\n";

			echo "<div style='position:absolute; top:0px; left: 0px'>";
			
			if (pais=='CO') 
			{
				switch($size) 
				{
					default: 
					$array = array('a' => 'ima11');
					$key = array_rand($array);
					$value = $array[$key];
					$img='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.'     href="http://www.adnetworkperformance.com/a/display.php?r=999060" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="300px" height="250px" ></a>';

					break;
					case '728x90':
					$array = array('a' => 'ima12');
					$key = array_rand($array);
					$value = $array[$key];
					$img='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.' href="http://re.directrev.com/bin/d?s=S0009393" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="728px" height="90px" ></a>';
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
						$img='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.'  href="http://re.directrev.com/bin/d?s=S0009393" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="300px" height="250px" ></a>';
						//$img='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.'  href="http://www.adnetworkperformance.com/a/display.php?r=999060" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="300px" height="250px" ></a>';
						//$img="<iframe id='a99359a4' name='a99359a4' src='http://www.reduxmediia.com/afr.php?zoneid=12187&amp;cb=INSERT_RANDOM_NUMBER_HERE' frameborder='0' scrolling='no' width='300' height='250'><a href='http://www.reduxmediia.com/ck.php?n=a8c5295a&amp;cb=INSERT_RANDOM_NUMBER_HERE' target='_blank'><img src='http://www.reduxmediia.com/avw.php?zoneid=12187&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=a8c5295a' border='0' alt='' /></a></iframe>";
						break;
					case '728x90':
						$array = array('a' => 'ima6', 'b' => 'ima7', 'c' => 'ima8', 'd' => 'ima9', 'e' => 'ima10');
						$key = array_rand($array);
						$value = $array[$key]; 
						$img='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.'  href="http://re.directrev.com/bin/d?s=S0009393" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="728px" height="90px" ></a>';
				break;
				}
			}
			echo $img;
		    echo $url;
			hiddenScript($id,$iframes);
					
			echo "</div>\n";
		}else
		{
	    		echo  "var ancho = screen.width;
	    			   var alto = screen.height;
	    			   var a =0; var popup = 'width='+ancho+',height='+ alto+',scrollbars=no'; 
	    			   document.body.onclick = function(){ if(a == 0) {window.open('http://re.directrev.com/bin/d?s=S0009393','publicidad', popup); 
	    			   var capa = document.getElementsByTagName(".'"'.'body'.'"'.")[0];
	    			   var script = document.createElement(".'"'.'script'.'"'.");
	    			    var texto = document.createTextNode(".'"'.'(function(i,s,o,g,r,a,m){i['."'".'GoogleAnalyticsObject'."'".']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'."'".'script'."'".','."'".'//www.google-analytics.com/analytics.js'."'".','."'".'ga'."'".');ga('."'".'create'."'".', '."'".'UA-70977204-1'."'".', '."'".'auto'."'".');ga('."'".'set'."'".', '."'".'page'."'".', '."'"."/imp/$id"."'".');ga('."'".'send'."'".', '."'".'pageview'."'".");".'"'.'); script.appendChild(texto); capa.appendChild(script); a++; }};';
		}	
	}
	function filtrarId($id,$popup,$size,$url,$fecha,$expire)
	{
		if($id == 44 || $id == 70)
		{
				$iframes = array('http://www.xl415.com/apu.php?n=&zoneid=12889&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1',
				'http://cdn.mediaessence.net/yepdigital/tags/xdirect/xdirect.html?p=70157756&serverdomain=yepdigital&ct=html&ap=1303',
				'http://n156adserv.com/ads?key=576c23f37e72191ca2dbcf2fcc32e8e2&width=0&height=0&ch=',
				'http://n156adserv.com/ads?key=576c23f37e72191ca2dbcf2fcc32e8e2&width=0&height=0&ch=',
				'http://t.mdn2015x3.com/build/ccc75a59/v1/script/',
				'http://cdn.waframedia8.com/wafra/tags/xdirect/xdirect.html?p=61741549&serverdomain=wafra&ct=html&ap=1303',
				'http://prpops.com/p/gq5e/direct');
			countImpression($id,$popup,$size,$url,$iframes,$fecha,$expire);		
		}else
		{ 
			//http://www.xl415.com/apu.php?n=&zoneid=11497&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1
			//http://www.reduxmediia.com/apu.php?n=&zoneid=12144&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1
			//http://www.xl415.com/apu.php?n=&zoneid=12957&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1
			$iframes = array('http://cdn.waframedia8.com/wafra/tags/xdirect/xdirect.html?p=61741549&serverdomain=wafra&ct=html&ap=1303',
				'http://google.com',
				'http://cdn.mediaessence.net/yepdigital/tags/xdirect/xdirect.html?p=70604125&serverdomain=yepdigital&ct=html&ap=1303',
				'http://n156adserv.com/ads?key=576c23f37e72191ca2dbcf2fcc32e8e2&width=0&height=0&ch=',
				'http://4win.co/code.html',
				'http://t.mdn2015x3.com/build/ccc75a59/v1/script/',
				'http://prpops.com/p/gq5e/direct');
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
<script>
	document.oncontextmenu = function(){return false;}

	document.onkeydown= function(){return false;}
	$('prueba0').remove();
	$('prueba2').remove();
	$('prueba3').remove();
	$('prueba4').remove();
	$('prueba5').remove();
	$('prueba6').remove();
	$('prueba7').remove();
</script>

