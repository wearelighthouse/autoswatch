<?php
	
	/**
	 * Relative path to colour definitions
	 */
	$colourDefinitions = '_colours.scss';
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
	
<title>AutoSwatch</title>
	
<style>abbr,address,article,aside,audio,b,blockquote,body,canvas,caption,cite,code,dd,del,details,dfn,div,dl,dt,em,fieldset,figcaption,figure,footer,form,h1,h2,h3,h4,h5,h6,header,hgroup,html,i,iframe,img,ins,kbd,label,legend,li,mark,menu,nav,object,ol,p,pre,q,samp,section,small,span,strong,sub,summary,sup,table,tbody,td,tfoot,th,thead,time,tr,ul,var,video{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:0 0}*,* *,:after,:before{box-sizing:border-box;-webkit-tap-highlight-color:rgba(255,255,255,0)!important;-webkit-focus-ring-color:rgba(255,255,255,0)!important;outline:0!important}body{font-family:sans-serif}*{transition:opacity .2s ease}.colours li{position:relative;width:100%;height:0;padding-bottom:100%;list-style-type:none}.colours li dd,.colours li dt{position:absolute;bottom:20px;right:20px;color:#fff;font-weight:700;text-shadow:0 1px 0 rgba(0,0,0,.2),0 0 1px rgba(0,0,0,.2),0 1px 2px rgba(0,0,0,.6)}.colours li dt{bottom:50px}@media (min-width:400px){.colours li{float:left;width:50%;padding-bottom:50%}}@media (min-width:730px){.colours li{width:33.3333333333%;padding-bottom:33.3333333333%}}@media (min-width:1000px){.colours li{width:25%;padding-bottom:25%}}@media (min-width:1400px){.colours li{width:20%;padding-bottom:20%}}@media (min-width:1900px){.colours li{width:16.6666666667%;padding-bottom:16.6666666667%}}</style>

</head>

<body>
	
	<ol class="colours">
	
		<?php
			if (file_exists($colourDefinitions)) {
		        $lines = explode("\n", file_get_contents($colourDefinitions));
		
		        $colours = [];
		
		        foreach ($lines as $line) {
		            if (!empty($line) && substr($line, 0, 1) === '$') {
		                $colour = explode(':', str_replace(';', '', $line));
		                
		                $colour[1] = trim($colour[1]);
		                $colour[1] = $colours[$colour[0]] = substr($colour[1], 0, 1) === '$' ? $colours[$colour[1]] : $colour[1];
		                
		                ?>
		                	<li style="background-color: <?= $colour[1] ?>;">
								<dt><?= $colour[0] ?></dt>
								<dd><?= $colour[1] ?></dd>
							</li>
		                <?php
		            }
		        }
			}
		?>
	
	</ol>

</body>

</html>