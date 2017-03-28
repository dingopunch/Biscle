<script type='text/javascript' src='http://code.jquery.com/jquery-1.8.3.js'></script> 
<script type='text/javascript' src="assets/js1/function.js"></script> 
<script src="assets/js/configure.js"></script> 
<script src="assets/js/modernizr.custom.js"></script>
<script src="assets/js/classie.js"></script>
<script>
	var menuLeft = document.getElementById('cbp-spmenu-s1'),
			showLeftPush = document.getElementById('showLeftPush'),
			body = document.body;
	showLeftPush.onclick = function() {
		classie.toggle(this, 'active');
		classie.toggle(body, 'cbp-spmenu-push-toright');
		classie.toggle(menuLeft, 'cbp-spmenu-open');
		disableOther('showLeftPush');
	};
	function disableOther(button) {
		if (button !== 'showLeftPush') {
			classie.toggle(showLeftPush, 'disabled');
		}
	}
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
<script src="assets/js/jquery.lighter.js" type="text/javascript"></script> 
<script type="text/javascript" src="assets/source/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="assets/source/jquery.fancybox.css" media="screen" />
<script type="text/javascript">
	$(document).ready(function() {
		$('.fancybox-buttons').fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
			prevEffect : 'none',
			nextEffect : 'none',
			helpers : {
				title : {
					type : 'inside'
				},
				buttons	: {}
			},
			afterLoad : function() {
				this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
			}
		});
	});
</script> 
<script>!window.jQuery && document.write(unescape('%3Cscript src="assets/js/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script> 
<!-- custom scrollbars plugin --> 
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script> 
<script>
	(function($){
		$(window).load(function(){
			$(".content").mCustomScrollbar({
				scrollButtons:{
					enable:true
				}
			});
		});
	})(jQuery);
</script> 
<script src="assets/js/jquery.confirm.js"></script> 
<script>
	$(".simpleConfirm").confirm();
</script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script> 
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
</body>
</html>
