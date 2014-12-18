<?php
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat</title>
	<script src="/jquery.js"></script>
	<script src="/timer.js"></script>

	<style>
	body {
	background-color: #eee;
	color: #222;
	font: 0.8125em/1.5 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

.container {
	padding: 40px 20px;
	width: 400px;
	height:500px;
	overflow-y: scroll;
}

/* .bubble */

.bubble {
	background-image: linear-gradient(bottom, rgb(210,244,254) 25%, rgb(149,194,253) 100%);
background-image: -o-linear-gradient(bottom, rgb(210,244,254) 25%, rgb(149,194,253) 100%);
background-image: -moz-linear-gradient(bottom, rgb(210,244,254) 25%, rgb(149,194,253) 100%);
background-image: -webkit-linear-gradient(bottom, rgb(210,244,254) 25%, rgb(149,194,253) 100%);
background-image: -ms-linear-gradient(bottom, rgb(210,244,254) 25%, rgb(149,194,253) 100%);
background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.25, rgb(210,244,254)),
	color-stop(1, rgb(149,194,253))
);
	border: solid 1px rgba(0, 0, 0, 0.5);
	/* vendor rules */
	border-radius: 20px;
	/* vendor rules */
	box-shadow: inset 0 5px 5px rgba(255, 255, 255, 0.4), 0 1px 3px rgba(0, 0, 0, 0.2);
	/* vendor rules */
	box-sizing: border-box;
	clear: both;
	float: left;
	margin-bottom: 20px;
	padding: 8px 30px;
	position: relative;
	text-shadow: 0 1px 1px rgba(255, 255, 255, 0.7);
	width: auto;
	max-width: 100%;
	word-wrap: break-word;
}
.bubble--alt {
	background-image: linear-gradient(bottom, rgb(172,228,75) 25%, rgb(122,205,71) 100%);
background-image: -o-linear-gradient(bottom, rgb(172,228,75) 25%, rgb(122,205,71) 100%);
background-image: -moz-linear-gradient(bottom, rgb(172,228,75) 25%, rgb(122,205,71) 100%);
background-image: -webkit-linear-gradient(bottom, rgb(172,228,75) 25%, rgb(122,205,71) 100%);
background-image: -ms-linear-gradient(bottom, rgb(172,228,75) 25%, rgb(122,205,71) 100%);
background-image: -webkit-gradient(
	linear,
	left bottom,
	left top,
	color-stop(0.25, rgb(172,228,75)),
	color-stop(1, rgb(122,205,71))
);
	float: right;
}
.main{
	max-width:400px;
	margin-top: 10px;

}
	</style>


</head>
<body>
<div class="main">
<div class="container">
		
</div>
<div style="float:right;margin-top:10px;"><input type="text" style="width:200px;height:30px" id="text"></div>
</div>
</body>
<script>
	var user=<?=$data?>;
	var wit=1
		if (user==1) {wit=2}
		var url='http://127.0.0.1/chatting?user='+user+'&event=recive&with='+wit;
	$('#text').keydown(function(e){
    	var message=$(this).val();
     if (e.which==13 && message.length) {
     	
     	$.get('http://127.0.0.1/chatting?user='+user+'&event=send&with='+wit+'&message='+message, function(data){
     		data=$.parseJSON(data);
     		if (data.success) {
     		$('.container').append('<div class="bubble">'+
		message+
	'</div>');	
  var wtf    = $('.container');
  var height = wtf[0].scrollHeight;
  wtf.scrollTop(height);
	$('#text').val('');	
     		};
    });
     };
    });
   var timer = $.timer(function() {
    	$.get( url, function( data ) {
			data=$.parseJSON(data);
	     $.each(data.data,function(index,value){
	     	$('.container').append('<div class="bubble bubble--alt">'+
			value.message+
		'</div>');
	     	var wtf    = $('.container');
  var height = wtf[0].scrollHeight;
  wtf.scrollTop(height);

	     });
	    });
                
        });

        timer.set({ time : 2000, autostart : true });

        timer.set(options);
        timer.play(reset);  // Boolean. Defaults to false.
        timer.pause();
        timer.stop();  // Pause and resets
        timer.toggle(reset);  // Boolean. Defaults to false.
        timer.once(time);  // Number. Defaults to 0.
        timer.isActive  // Returns true if timer is running
        timer.remaining // Remaining time when paused 
        
  
</script>
</html>