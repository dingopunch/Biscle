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
			jq(".imgsize").imagefill(); 
			$.post("sessionom.php",{ userid:u_id, pid:p_id},function(ajaxresult){
				if(p_id==2){
				$("#paybtn1").click();
				} 
				else if(p_id==3){
				$("#paybtn2").click();
				}
				else if(p_id==4){
				$("#paybtn3").click();
				}
			$('#down2').html(ajaxresult);
			});
		});
	}	
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

<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/run_prettify.js"></script>
<script type="text/javascript" src="assets/js/jquery.form.js"></script>
<script type="text/javascript">
 
$(document).ready(function(){

	$('body').on('click','.kkk',function(){
		var k= this.id.substr(11);

		$('#'+this.id).hide();
		k="#commentwrap2-"+k;
		$(k).show();
	});




	$('.select ul.options li').on('click',function(evt){console.log($(evt.target));$(evt.target).parent().parent().find('select').val($(evt.target).html());});
				
	$($('[data-dismiss="modal"]')[0]).on('click',function(){location.reload();});	
    $.notifyDefaults({
	
	allow_dismiss: true,
});
$(".share_option ul li").click(function(evt){
    $(evt.target).parent().parent().find("[name='access']").val($(evt.target).html());
})

$('#btn-crop').on('click',function(){
        src=$("#dpic img").attr("src");
        y=$('iframe').contents().find('.cropper-crop-box').css('top');
        x=$('iframe').contents().find('.cropper-crop-box').css('left');
        w=$('iframe').contents().find('.cropper-crop-box').css('width');
        h=$('iframe').contents().find('.cropper-crop-box').css('height');
        y=y.substring(0,y.length-2);
        x=x.substring(0,x.length-2);
        w=w.substring(0,w.length-2);
        h=h.substring(0,h.length-2);
        
        src={src:src,x:x,y:y,w:w,h:h};
        console.log(src);
        str=JSON.stringify(src);
        $.post('includes/crop.php',src,function(data){
            $("#dpic").html(data);
            alert("Picture Cropped...");
        });
});


$('#img-edit').on('change',function(){
	var fs=AlertFilesize();
	console.log(fs)
	if(fs>2097152){
		alert("File can not be larger than 2mb...");
		return;
	}

	$('#profilepic').ajaxForm({
			target:'#dpic',
		beforeSubmit:function(e){
		},
		success:function(data){
			$("#dpic").html(data);
            src=$("#dpic img").attr("src");
            $('#btn-img-crop').click();
            $('#crop-img-body').html('<iframe style="width:400px; height:400px;" src="crop/index.php?src='+src+'"></iframe>');
		},
		error:function(e){
		}
	}).submit();
});

inP='f';
lastid=0;
	   	setInterval(function (){
           if(inP=='f'){
	          	inP='t';
	               
	            $.get('getNotification.php',function(res){
					str='<div style="display:none;"><i class="fa fa-circle"></i></div>';
	                ele= $('.msg div');
	                
	                if(typeof ele == 'undefined')
	                	$('.msg').html( $('.msg').html()+str);
	                else 
	                	$('.msg div').attr('style','display:none');
	                // console.log(res);

	                obj=JSON.parse(res);
	                
	                if( obj.message.length>0){
	                    if(obj.message[obj.message.length-1].type=="user-friend" && obj.message[obj.message.length-1].read=="0" ) {
	                        str='<div style="display:block;"><i class="fa fa-circle"></i></div>';
	                        ele= $('.msg div');
	                        
	                        if(typeof ele == 'undefine')
	                        	$('.msg').html( $('.msg').html()+str);
	                        else 
	                        	$('.msg div').attr('style','display:block');
	                        
	                        $('.msg a').attr('href','message.php?new='+obj.message[obj.message.length-1].senderid);
	                        
	                        message=true;
	                       	
	                       	console.log(obj.message[obj.message.length-1].id!=lastid);
	                        
	                        if(obj.message[obj.message.length-1].id!=lastid) {
	                            loadthisuserConvo();
	                            loadthisuser(obj.message[obj.message.length-1].senderid);
	                            lastid=obj.message[obj.message.length-1].id;
	                        }
	                    }
	                }

	                if(obj.not.length>0) {
	                    refreshRight();
	                    str='<div style="display:block;" class="symbol" ><i class="fa fa-circle"></i></div>';
	                    ele= $('.notis div.symbol');
	                    
	                    if(ele.length<=0 || typeof ele == 'undefine')
	                    	$('.notis').append(str);
	                    else 
	                    	$('.notis div.symbol').attr('style','display:block');
	                   	
	                   	for(i=0;i<obj.not.length;i++)
	                        $.notify({ 
	                        	/*icon: 'glyphicon glyphicon-warning-sign',*/
	                            /*title: 'Bootstrap notify',*/
	                            message: obj.not[i],
	                            /*url: 'https://github.com/mouse0270/bootstrap-notify',*/
	                            /*target: '_blank'*/
							});
	                }
	                inP='f';
	            });
       		}
        },4000);
  
});
function AlertFilesize(){
    if(window.ActiveXObject){
        var fso = new ActiveXObject("Scripting.FileSystemObject");
        var filepath = document.getElementById('img-edit').value;
        var thefile = fso.getFile(filepath);
        var sizeinbytes = thefile.size;
    }else{
        var sizeinbytes = document.getElementById('img-edit').files[0].size;
    }
	return sizeinbytes;
    var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
    fSize = sizeinbytes; i=0;while(fSize>900){fSize/=1024;i++;}

    alert((Math.round(fSize*100)/100)+' '+fSExt[i]);
}
</script>
<script src="assets/ckeditor/ckeditor.js"></script>  
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
		if(tname=='products')
		$($("[href*='pid="+pid+"']")[0]).parent().parent().parent().remove()
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
	//globar reminders

var frnd=true;
var flw=true;
// follow user function
function followuser(userfollower, userfollowed, actionid) {

	if(flw==true) {
		flw = false;
		$.post("includes/follow/follow.php", {
			cuser: userfollower,
			cfollow: userfollowed,
			actid: actionid
		}, function (ajaxresult) {
			$('#follow' + userfollowed).html(ajaxresult);
		});

	}
}
//block
function blockuser(userfollower, userfollowed, actionid) {
	$.post("includes/follow/block.php",{cuser:userfollower, cfollow:userfollowed, actid:actionid},function(ajaxresult){
		$('#block'+userfollowed).html(ajaxresult);
	});
}
function unblockuser(userfollower, userfollowed, actionid) {
	$.post("includes/follow/block.php",{cuser:userfollower, cfollow:userfollowed, actid:actionid},function(ajaxresult){
		$('#block'+userfollowed).html(ajaxresult);
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
	if(frnd==true) {
		frnd = false;
		$.post("includes/follow/friend.php", {
			cuser: userfollower,
			cfollow: userfollowed,
			actid: actionid
		}, function (ajaxresult) {
			$('#friend' + userfollowed).html(ajaxresult);
		});

	}
}
function getComments(type, pid) {
        last=$("#commnetload-"+pid).find("a").attr("val1");
	    $.get("includes/post/comments.php",{val:last, pid:pid},function(ajaxresult){
		res=ajaxresult;
        $("#commnetload-"+pid).before(res);
        $("#commnetload-"+pid).find("a").attr("val1",$("#commnetload-1").prev().attr("id").substring(11));
	});
    return false;
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
		refreshRight();
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

function refreshRight(){
    $.post("includes/rightbara.php",{},function(data){
        $("#right-bar").html(data);
    });
}
// dellete friend and followers function
var glo_frid = 0;
var glo_actid = 0;
function delfriend(frid, actid) {
	glo_frid = frid;
	glo_actid = actid;
	$('#deleteConfirm').modal('show'); 
} 

function actualDelete(){
	$( glo_actid=="1"?" #friend_" + glo_frid:"#follow_" + glo_frid).hide();
	$.post("includes/follow/delfriend.php",{friendid:glo_frid, actionid:glo_actid},function(ajaxresult){
		$('#delfriends').html(ajaxresult);
		$('#deleteConfirm').modal('hide'); 
	}); 
} 
 //block user 
 function blockUserbyEmail(){ 
	 var usr=$("#new-blk-usr"); 
	 emails=$('#blockusers li span'); 
	 var str="";
		 for(i=0;i<emails.length;i++){
			 str+=$(emails[i]).html()+", ";
		 }
		 str+=usr.val()+", "; 
		 $('#blockusers').append('<li><a> X</a><span>'+usr.val()+'</span></li>'); 
		 $('[name="blockedusers[]"]').html(str); 
 }
 $(document).on('click','#blockusers li a',function(evt){

$(evt.target).parent().remove();
emails=$('#blockusers li span'); 
	 var str="";
		 for(i=0;i<emails.length;i++){
			 str+=$(emails[i]).html()+", ";
		 }
		 $('[name="blockedusers[]"]').html(str);
});
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
         $('.write-msg').css('display','block');
         loading=false;
         $('.live-chat').scrollTop($('.live-chat')[0].scrollHeight);
         $('.live-chat').scroll(function(evt){if($(this).scrollTop()<=10){
         
             first=$(".live-chat").find('.messaging div:nth-child(1)');
                fromto=$("#from-to");
                if(typeof fromto != 'undefined'){
                    try{
                        fromto=fromto.html();
                        fromto=fromto.split(",");
                        from=fromto[0];
                        from=Number(from);
                        from+=10;
                        if(loading==false){
                            loading=true;
                            getMessgages(clid,from,10);
                        }
                    }catch(err){
                        fromto="0,0";
                        console.log(err);
                    }
                }else {
                    fromto="0,0";
                }
                console.log(fromto);
         };})
	});
}
function loadthisuserConvo() {
	$.post("includes/message/getConvo.php",function(ajaxresult){
		$('#frienduserresult').html(ajaxresult);
         //$('.write-msg').css('display','block');
         //$('.live-chat').scrollTop($('.live-chat')[0].scrollHeight);
	});
}
// Send Message
/*function sendmesg(){
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
	} */
// Send Message function ends
// dellete messages
function delmsg(conid) {
  $('#msg'+conid).hide();
	$.post("includes/message/delmesages.php",{clientid:conid},function(ajaxresult){
		$('#delmsg').html(ajaxresult);
        v=$('#umresult').height(); $('#umresult').html(' ');$('#umresult').height(v);
	});
}
//
function getMessgages(with1,from,to){
    $.post("includes/message/messageusersearch.php",{clientid:with1,from:from,to:to},function(res){
        $("#from-to").remove();
        $('#t-div').html(res);
        $(".live-chat .messaging").html($("#t-div .live-chat .messaging").html()+$(".live-chat .messaging").html());
        loading=false;
    });
}


// search users to send messages	
function findmsguser() {
	var inputvalue=$('#finduser').val();
	$.post("includes/message/finduserformsg.php",{finduser:inputvalue},function(ajaxresult){
		$('#frienduserresult').html(ajaxresult);
       
	});
}
$(document).on('click',".cancel, [value='Cancel']",function(evt){
	window.location.href=document.referrer;
});
// filter for profinity words	
function filterwords(fieldid) {
	var inputvalue=$('#'+fieldid).val();
	$.post("includes/buy/filterwords.php",{filterwords:inputvalue},function(ajaxresult){
		$('#filterresult').html(ajaxresult);
	});
}

</script>


<script src="assets/js/notify.js"></script>
<script>
	var userId = <?php echo $_SESSION['userid'];?>;
</script>
<script src="assets/js/ping.js"></script>
<script> 
    
    </script>
<style>
    .col-xs-11.col-sm-4.alert.alert-info.animated.fadeInDown {
  width: 25%;
  height: 100px;
  z-index: 9999999999999 !important;
  text-align: left;
  font-size:16px !important;
  bottom:20px !important;
  left:20px !important;
  top:initial !important;
  right:initial !important;
  
}
    </style>

<script type="text/javascript">
	$("#filterbtn").click(function(event){
      if ($("#rtitle").val().length < 20) {
	      event.preventDefault();
	      $("#err_rtitle").css("display","block");
      } else {
      	$("#err_rtitle").css("display","none");
      }

      if($("#rdesc").val().length < 50) {
      		event.preventDefault();
	      	$("#err_rdesc").css("display","block");
      } else {
	      	$("#err_rdesc").css("display","none");
      }
    });
</script>
</body>
</html>