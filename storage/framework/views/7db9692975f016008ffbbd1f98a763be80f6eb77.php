<!DOCTYPE html>
<html>
<head>
    <title><?php echo e($game->title); ?></title>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
      <style>
         body,
         html {
         position: fixed;
         } 
      </style>
   </head>

<script>

    if( !sessionStorage.getItem('sessionId') ){
        sessionStorage.setItem('sessionId', parseInt(Math.random() * 1000000));
    }

var exitUrl='';
		if(document.location.href.split("api_exit=")[1]!=undefined){
		exitUrl=document.location.href.split("api_exit=")[1].split("&")[0];
		}
addEventListener('message',function(ev){
	
if(ev.data=='CloseGame'){

document.location.href=exitUrl;	
}
	
	});
</script>

<body style="margin:0px;width:100%;background-color:black;overflow:hidden">



<iframe id='game' style="margin:0px;border:0px;width:100%;height:100vh;" src='/games/EyeofTheStorm/index.html?lang=en&cur=<?php if( auth()->user()->present()->shop ): ?><?php echo e(auth()->user()->present()->shop->currency); ?><?php endif; ?>&gameSymbol=vs1dragon8&websiteUrl=&lobbyURL=' allowfullscreen>


</iframe>




</body>
<script rel="javascript" type="text/javascript" src="/games/<?php echo e($game->name); ?>/device.js"></script>
<script rel="javascript" type="text/javascript" src="/games/<?php echo e($game->name); ?>/addon.js"></script>
</html>
<?php /**PATH /var/www/casino/resources/views/frontend/games/list/EyeofTheStorm.blade.php ENDPATH**/ ?>