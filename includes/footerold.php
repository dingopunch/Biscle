<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	 <script type="text/javascript" src="assets/js/jquery.paynow.min.js"></script>
	<script type="text/javascript">
	jQuery.noConflict();
jQuery(document).ready(function($){
			
		$('#pn4').paynow({type: 'buynow', style: 'double', tooltip: 'Click to checkout with PayPal!'});
		$('#pn6').paynow({type: 'subscribe', style: 'double', tooltip: 'Click to checkout with PayPal!'});
		$('#pn7').paynow({type: 'subscribe', style: 'double', tooltip: 'Click to checkout with PayPal!'});
			
		});
	</script>
<script type='text/javascript' src='assets/js/jquery-1.8.3.js'></script> 
<script type='text/javascript' src="assets/js1/function.js"></script> 
<script src="assets/js/configure.js"></script> 
<script src="assets/js/modernizr.custom.js"></script>
 <script type="text/javascript">
	  function orderp(u_id,p_id){
			$(document).ready(function($){
				
				$.post("sessionom.php",{ userid:u_id, pid:p_id},function(ajaxresult){
					if(p_id==2){
					$("#pn4").click();
					}
					else if(p_id==3){
					$("#pn6").click();
					}
					else if(p_id==4){
					$("#pn7").click();
					}
				$('#down2').html(ajaxresult);
				});
			});
	};
	
	</script>
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
<script src="assets/js/jquery.min.js"></script> 
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
<script>!window.jQuery && document.write(unescape('%3Cscript src="js/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script> 
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
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/run_prettify.js"></script>
<script type="text/javascript" src="assets/js/jquery.form.js"></script>
<script type="text/javascript">
$(document).ready(function(){		
		$('#img-edit').on('change',function(){
				$('#profilepic').ajaxForm({
					target:'#dpic',
				beforeSubmit:function(e){
				},
				success:function(data){
					$("#dpic").html(data);
				},
				error:function(e){
				}
		}).submit();
	});
	
});
</script>
<script type="text/javascript">
function buylike(pid,uid,likeid,tableid) {
	$.post("includes/share/like.php",{postid:pid, userid:uid, action:likeid, tblname:tableid},function(ajaxresult){
		$('#likeup'+pid).html(ajaxresult);
	});
}
function sumitcomment(productid){
		 $.ajax({
			 type: "POST",
			 url: "includes/share/comments.php",
			 data: $("#comment-form"+productid).serialize(),
		 beforeSend: function() {                                
		$("#commentwrap").html("");           
		 },
		success: function(data){
			$('.comentbox').val('');
			$("#commentwrap"+productid).html(data);
					 }
			});
		return false;
	}
function delitem(tname,pid,uid) {
	$('#postitme'+pid).hide();
	$.post("includes/delete.php",{tblname:tname, postid:pid, userid:uid},function(ajaxresult){
		$('#delcoment').html(ajaxresult);
	});
}
function delitem2(tname,pid,uid) {
	$('#commnetitem'+pid).hide();
	$.post("includes/delete.php",{tblname:tname, postid:pid, userid:uid},function(ajaxresult){
		$('#delcoment').html(ajaxresult);
	});
}
function delhistory(tname,pid,uid) {
	$('#home1'+pid).hide();
	$.post("includes/deletehistory.php",{tblname:tname, postid:pid, userid:uid},function(ajaxresult){
		$('#delcoment').html(ajaxresult);
	});
}

// Custom serch function
function customsearch(){
		 $.ajax({
			 type: "POST",
			 url: "includes/search/customsearch.php",
			 data: $("#customsearch").serialize(),
		 beforeSend: function() {                                
		$("#custemsearchresult").html("");           
		 },
		success: function(data){
			$("#custemsearchresult").html(data);
					 }
			});
		return false;
	} 
// Custom serch function ends
	
// follow user function
function followuser(userfollower, userfollowed, actionid) {
	$.post("includes/follow/follow.php",{cuser:userfollower, cfollow:userfollowed, actid:actionid},function(ajaxresult){
		$('#follow'+userfollowed).html(ajaxresult);
	});
}
// unfollow user function	
function unfollowuser(userfollower, userfollowed, actionid) {
	$.post("includes/follow/follow.php",{cuser:userfollower, cfollow:userfollowed, actid:actionid},function(ajaxresult){
		$('#follow'+userfollowed).html(ajaxresult);
	});
}
// friend user function
function friend(userfollower, userfollowed, actionid) {
	$.post("includes/follow/friend.php",{cuser:userfollower, cfollow:userfollowed, actid:actionid},function(ajaxresult){
		$('#friend'+userfollowed).html(ajaxresult);
	});
}
// unfriend user function	
function unfriend(userfollower, userfollowed, actionid) {
	$.post("includes/follow/friend.php",{cuser:userfollower, cfollow:userfollowed, actid:actionid},function(ajaxresult){
		$('#friend'+userfollowed).html(ajaxresult);
	});
}
// repond friend request	
function friendrequest(nid, rid, sid, aid) {
	$.post("includes/follow/friendrequest.php",{notificationId:nid, receiverId:rid, notificationSenderid:sid, actionid:aid },function(ajaxresult){
		$('#notifiid'+nid).html(ajaxresult);
	});
}
// search followers	
function findfollower() {
  var inputvalue=$('#followfield').val();
	var actid=1;
	$.post("includes/follow/findfollower.php",{findfollower:inputvalue, actionid:actid},function(ajaxresult){
		$('#folloresult').html(ajaxresult);
	});
}

// search friend	
function findfriend() {
	var inputvalue=$('#friendfield').val();
	var actid=2;
	$.post("includes/follow/findfriend.php",{findfriend:inputvalue, actionid:actid},function(ajaxresult){
		$('#friendresult').html(ajaxresult);
	});
}

// dellete friend and followers function
function delfriend(frid, actid) {
  $('#friend'+frid).hide();
	$.post("includes/follow/delfriend.php",{friendid:frid, actionid:actid},function(ajaxresult){
		$('#delfriends').html(ajaxresult);
	});
}

// settings function
function usersettings(){
		 $.ajax({
			 type: "POST",
			 url: "includes/settings/settings.php",
			 data: $("#usersettings").serialize(),
		 beforeSend: function() {                                
		$("#settingsave").html("");           
		 },
		success: function(data){
			$("#settingsave").html(data);
					 }
			});
		return false;
	} 
// settings function ends

// search for message users
function loadthisuser(clid) {
	$.post("includes/message/messageusersearch.php",{clientid:clid},function(ajaxresult){
		$('#umresult').html(ajaxresult);
	});
}

// Send Message
function sendmesg(){
		 $.ajax({
			 type: "POST",
			 url: "includes/message/sendmessage.php",
			 data: $("#sendmesg").serialize(),
		 beforeSend: function() {                                
		$("#messagesent").html("");           
		 },
		success: function(data){
			$("#messagesent").html(data);
					 }
			});
		return false;
	} 
// Send Message function ends

// dellete messages
function delmsg(conid) {
  $('#msg'+conid).hide();
	$.post("includes/message/delmesages.php",{clientid:conid},function(ajaxresult){
		$('#delmsg').html(ajaxresult);
	});
}

// search users to send messages	
function findmsguser() {
	var inputvalue=$('#finduser').val();
	$.post("includes/message/finduserformsg.php",{finduser:inputvalue},function(ajaxresult){
		$('#frienduserresult').html(ajaxresult);
	});
}

// filter for profinity words	
function filterwords(fieldid) {
	var inputvalue=$('#'+fieldid).val();
	$.post("includes/buy/filterwords.php",{filterwords:inputvalue},function(ajaxresult){
		$('#filterresult').html(ajaxresult);
	});
}
</script>
</body>
</html>