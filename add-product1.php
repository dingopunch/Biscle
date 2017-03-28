<?php include('includes/header.php'); ?>

<?php

$pid=$_GET['pid'];
$q="SELECT * FROM products where id='$pid'";
$res=mysqli_query($con,$q);
$prod=mysqli_fetch_assoc($res);
 ?>
    <section id="middle">
      <div class="container">
        <div class="row">
          <div class="top-bar clearfix">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="mainbar" >
                <ul class="mainMenu" >
                  <li><a href="home"><i class="fa fa-home">&nbsp;</i>Home</a> </li>
                  <li><a href="update"><i class="fa fa-bell">&nbsp;</i>Update</a> </li>
                  <li><a href="wall"><i class="fa fa-pencil">&nbsp;</i>Wall</a> </li>
                  <li><a href="profile" ><i class="fa fa-pencil-square-o">&nbsp;</i>Profile</a> </li>
                  <li><a href="product" ><i class="fa fa-shopping-cart">&nbsp;</i>Product</a> </li>
                </ul> 
                <div class="set-btn"> <a href="settings" class="btn"><i class="fa fa-cog"></i></a> </div>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div> 
        </div>
        <div class="row">
          <?php include('includes/leftbar.php'); ?>
          <div class="col-md-6">
            <div class="creat_product_n">
              <div class="add-product">
                <div class="descrip">
                  <form id="add-product" action="includes/product/addproduct.php" method="post" enctype="multipart/form-data">
                    <h1>Title:</h1>
                    <input type="text" value="<?php echo $prod['title']; ?>" name="title" class="prd_title_text_bx" id="product_title" />
                    
                     <input type="hidden" value="<?php echo $prod['id']; ?>" name="pid"  id="product_pid" />
                   
                    
                    <h1>Description:</h1> 
                   
                    <textarea class="ckeditor" name="description"><?php echo $prod['description']; ?></textarea>
                    <div class="dropzone" id="image-drp" >
                        
                        
                        </div>                   
                    
                    <div class="product-btn">
                      <div class="shareto">
                        <select name="access">
                              <option value="Public">Public</option>
                              <option value="Friends">Friends</option>
                            </select>
                      </div>
                      <label>
                        <input type="button" name="" value="Cancel" class="cancel"  />
                      </label>
                      <label>
                        <input type="submit" name="" value="Save" class="save" />
                      </label>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php include('includes/rightbar.php'); ?>
        </div>
      </div>
    </section>
</div>
<?php include('includes/footer.php'); ?>
<script src="assets/js/script2.js"></script>
<script type="text/javascript">
		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
								$('#pic-sample').show();
								setTimeout(function(){ $('#loadingimg').hide(); }, 2000);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#img-upload").change(function(){
        readURL(this);
    });
		
		function cancelimg() {
			document.getElementById('pic-sample').style.display='none'
			document.getElementById('img-upload').value='';
		}

   function hidethis() {
	  	$("#thisone").hide(); 
	 }
</script>
<style>
    
    .abcd img{
        width: 100%;
        height: 100%;
    }
    .abcd{
          width: 150px;
            height: 150px;
    }
    #image-drp{
        width:auto;
        min-height:200px;
    }
    .dz-preview, #thisone{
          width: 130px;
          height:130px;
          overflow:hidden;
          margin-right:15px;
           margin-bottom:15px;
          position:relative;
          
    }
    .dz-image img{
        height: 100%;
    }
    #thisone{
        float:right;
    }
    .dz-preview .dz-remove{
        position:absolute;
        right:5px;
        top:5px;
    }
    .dz-progress{
        height:20px;
        width:50%;
        background:#777;
        position:absolute;
        right:25%;
        display:none;
        top:50%;
    }
    .dz-progress div{
        height:100%;
        box-sizing: content-box;
        background:#7777dd;
    }
    /*.dz-details,.dz-size,.dz-filename,.dz-error-message,.dz-success-mark,.dz-error-mark{
        display:none;
    }*/
    .dz-remove{
        color: #0b648f;
        font-weight: 700; 
          z-index: 9999999999;
    }
    .dropzone, .dropzone * { box-sizing: content-box;; }

.dropzone { min-height: 250px; border: 2px solid rgba(0, 0, 0, 0.3); background: white; padding: 14px 14px; }
.dropzone.dz-clickable { cursor: pointer; }
.dropzone.dz-clickable * { cursor: default; }
.dropzone.dz-clickable .dz-message, .dropzone.dz-clickable .dz-message * { cursor: pointer; }
.dropzone.dz-started .dz-message { display: none; }
.dropzone.dz-drag-hover { border-style: solid; }
.dropzone.dz-drag-hover .dz-message { opacity: 0.5; }
.dropzone .dz-message { text-align: center; margin: 2em 0; }
.dropzone .dz-preview { position: relative; display: inline-block; vertical-align: top; margin: 16px; height:130px; min-height: 130px; }
.dropzone .dz-preview:hover { z-index: 1000; }
.dropzone .dz-preview:hover .dz-details { opacity: 1; }
.dropzone .dz-preview.dz-file-preview .dz-image { border-radius: 20px; 
background: #999;   width: 100%;
  height: 100%; background: linear-gradient(to bottom, #eee, #ddd); }
.dropzone .dz-preview.dz-file-preview .dz-details { opacity: 1; }
.dropzone .dz-preview.dz-image-preview { background: white; }
.dropzone .dz-preview.dz-image-preview .dz-details { -webkit-transition: opacity 0.2s linear; -moz-transition: opacity 0.2s linear; -ms-transition: opacity 0.2s linear; -o-transition: opacity 0.2s linear; transition: opacity 0.2s linear; }
.dropzone .dz-preview .dz-remove { font-size: 14px; text-align: center; display: block; cursor: pointer; border: none; }
.dropzone .dz-preview .dz-remove:hover { text-decoration: underline; }
.dropzone .dz-preview:hover .dz-details { opacity: 1; }
.dropzone .dz-preview .dz-details { z-index: 20; position: absolute; top: 0; left: 0; opacity: 0; font-size: 13px; min-width: 100%; max-width: 100%; padding: 2em 1em; text-align: center; color: rgba(0, 0, 0, 0.9); line-height: 150%; }
.dropzone .dz-preview .dz-details .dz-size { margin-bottom: 1em; font-size: 16px; }
.dropzone .dz-preview .dz-details .dz-filename { white-space: nowrap; }
.dropzone .dz-preview .dz-details .dz-filename:hover span { border: 1px solid rgba(200, 200, 200, 0.8); background-color: rgba(255, 255, 255, 0.8); }
.dropzone .dz-preview .dz-details .dz-filename:not(:hover) { overflow: hidden; text-overflow: ellipsis; }
.dropzone .dz-preview .dz-details .dz-filename:not(:hover) span { border: 1px solid transparent; }
.dropzone .dz-preview .dz-details .dz-filename span, .dropzone .dz-preview .dz-details .dz-size span { background-color: rgba(255, 255, 255, 0.4); padding: 0 0.4em; border-radius: 3px; }
.dropzone .dz-preview:hover .dz-image img { -webkit-transform: scale(1.05, 1.05); -moz-transform: scale(1.05, 1.05); -ms-transform: scale(1.05, 1.05); -o-transform: scale(1.05, 1.05); transform: scale(1.05, 1.05); -webkit-filter: blur(8px); filter: blur(8px); }
.dropzone .dz-preview .dz-image { border-radius: 20px; overflow: hidden;   width: 100%;
  height: 100%;  position: relative; display: block; z-index: 10; }
.dropzone .dz-preview .dz-image img { display: block; }
.dropzone .dz-preview.dz-success .dz-success-mark { -webkit-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1); -moz-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1); -ms-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1); -o-animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1); animation: passing-through 3s cubic-bezier(0.77, 0, 0.175, 1); }
.dropzone .dz-preview.dz-error .dz-error-mark { opacity: 1; -webkit-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1); -moz-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1); -ms-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1); -o-animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1); animation: slide-in 3s cubic-bezier(0.77, 0, 0.175, 1); }
.dropzone .dz-preview .dz-success-mark, .dropzone .dz-preview .dz-error-mark { pointer-events: none; opacity: 0; z-index: 500; position: absolute; display: block; top: 50%; left: 50%; margin-left: -27px; margin-top: -27px; }
.dropzone .dz-preview .dz-success-mark svg, .dropzone .dz-preview .dz-error-mark svg { display: block; width: 54px; height: 54px; }
.dropzone .dz-preview.dz-processing .dz-progress { opacity: 1; -webkit-transition: all 0.2s linear; -moz-transition: all 0.2s linear; -ms-transition: all 0.2s linear; -o-transition: all 0.2s linear; transition: all 0.2s linear; }
.dropzone .dz-preview.dz-complete .dz-progress { opacity: 0; -webkit-transition: opacity 0.4s ease-in; -moz-transition: opacity 0.4s ease-in; -ms-transition: opacity 0.4s ease-in; -o-transition: opacity 0.4s ease-in; transition: opacity 0.4s ease-in; }
.dropzone .dz-preview:not(.dz-processing) .dz-progress { -webkit-animation: pulse 6s ease infinite; -moz-animation: pulse 6s ease infinite; -ms-animation: pulse 6s ease infinite; -o-animation: pulse 6s ease infinite; animation: pulse 6s ease infinite; }
.dropzone .dz-preview .dz-progress { opacity: 1; z-index: 1000; pointer-events: none; position: absolute; height: 16px; left: 50%; top: 50%; margin-top: -8px; width: 80px; margin-left: -40px; background: rgba(255, 255, 255, 0.9); -webkit-transform: scale(1); border-radius: 8px; overflow: hidden; }
.dropzone .dz-preview .dz-progress .dz-upload { background: #333; background: linear-gradient(to bottom, #666, #444); position: absolute; top: 0; left: 0; bottom: 0; width: 0; -webkit-transition: width 300ms ease-in-out; -moz-transition: width 300ms ease-in-out; -ms-transition: width 300ms ease-in-out; -o-transition: width 300ms ease-in-out; transition: width 300ms ease-in-out; }
.dropzone .dz-preview.dz-error .dz-error-message { display: block; }
.dropzone .dz-preview.dz-error:hover .dz-error-message { opacity: 1; pointer-events: auto; }
.dropzone .dz-preview .dz-error-message { pointer-events: none; z-index: 1000; position: absolute; display: block; display: none; opacity: 0; -webkit-transition: opacity 0.3s ease; -moz-transition: opacity 0.3s ease; -ms-transition: opacity 0.3s ease; -o-transition: opacity 0.3s ease; transition: opacity 0.3s ease; border-radius: 8px; font-size: 13px; top: 40px; left: 10px; width: 80px; background: #be2626; background: linear-gradient(to bottom, #be2626, #a92222); padding: 0.5em 1.2em; color: white; }
.dropzone .dz-preview .dz-error-message:after { content: ''; position: absolute; top: -6px; left: 64px; width: 0; height: 0; border-left: 6px solid transparent; border-right: 6px solid transparent; border-bottom: 6px solid #be2626; }
 
    </style> 
    <script>
        drp=jq("div#image-drp").dropzone({maxFilesize:2,addRemoveLinks:true, url: "includes/product/upload.php"
    ,dictRemoveFile:"X",
     acceptedFiles: 'image/*',
    maxFiles:9,
success:function(file,evt){
    _ref = file.previewElement;
    var pb=$(_ref).find(".dz-progress");
    pb.css("display","none"); 
    dest=evt;
    fl=file.name;
    if(typeof dest == "undefined")dest=fl;
    $("#add-product").append("<input type='hidden' name='pics[]' src='"+fl+"' value='"+dest+"' />");
},
maxfilesexceeded: function(file) {
        alert("File limit exceeded!!!");
        this.removeFile(file);
    }, 
    error:function(file,error,r2){
        prev=file.previewElement;
        //console.log(file);
        alert(error);
        prev.remove()
        //console.log(r2); 
    },
uploadprogress: function(file, progress, bytesSent) {
    // Display the progress
    _ref = file.previewElement;
    var pb=$(_ref).find(".dz-progress");
    var prg=pb.find(".dz-bar");
    if(prg.length<=0){
        pb.append("<div class='dz-bar' ></div>");
    }
    if(progress>0)pb.css("display","block");
    if(progress>100)pb.css("display","none");
    prg=pb.find(".dz-bar");
    prg.css("width",progress+"%");
    
  }, 
removedfile:function(fl){
    dst=fl.name;
    //$("#image-drp")[0].dropzone.removeFile(dst);
    try{
    $("input[type='hidden'][src='"+dst+"']").remove();
    }catch(e){ 
         
    }
    file=fl;
    var _ref;
      return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
   
}

 }
        );
        
        existingFiles=[<?php 
        
        
        $arrI=explode(",",$prod['imageUrl']); 
        for($i=0;$i<count($arrI);$i++){ 
            echo "{name:'".$arrI[$i]."',size:'12345678'}";
            if($i!=count($arrI)-1)echo ","; 
        }
        
        ?>];
        myDropzone=Dropzone.forElement("div#image-drp");
        for (i = 0; i < existingFiles.length; i++) {
            myDropzone.emit("addedfile", existingFiles[i]);
            myDropzone.emit("thumbnail", existingFiles[i], "assets/files/products/"+existingFiles[i].name);
            myDropzone.emit("complete", existingFiles[i]);   
            myDropzone.emit("success", existingFiles[i]);  
                       
        } 
        
         
        jq("#thisone").click(function(evt){
            $(evt.target).parent().click();
        });
        $("#add-product").on("submit",function(evt){
            evt.preventDefault(); 
            
            $.post("includes/product/addproduct.php",$("#add-product").find("input,select").serialize()+"&description="+ encodeURIComponent(CKEDITOR.instances['description'].getData())
            ,function(res){ 
                alert(res);
                top.location.href = "<?php echo BASE_URL; ?>product"; 

            }); 
            return false;
        });
    </script>