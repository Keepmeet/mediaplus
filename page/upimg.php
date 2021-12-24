<div style="text-align: center; padding-top: 10px;">
<label for="tougao_img"></label>
<input class="ke-input-text" type="text" id="jiapic" name="tougao_img" value="" placeholder="<?php _e( 'Video screenshot', 'mediaplus' ); ?>" />
<input type="button" id="upimgButton" value="<?php _e( 'Cover', 'mediaplus' ); ?>" />
</div>
<div style="text-align: center; padding-top: 10px;display:none">
<label class="nbsp" for="tougao_title"><?php _e( 'Title', 'mediaplus' ); ?></label>
<input type="text" class="input" value="" id="tougao_title" name="tougao_title" />
</div>
	<link rel="stylesheet" href="<?php echo esc_url( home_url( '/' ) ); ?>editor/themes/default/default.css" />
	<script src="<?php echo esc_url( home_url( '/' ) ); ?>editor/kindeditor-all-min.js"></script>
		<script>
			KindEditor.ready(function(K) {
				var uploadbutton = K.uploadbutton({
					button : K('#upimgButton')[0],
					fieldName : 'imgFile',
					url : '<?php echo esc_url( home_url( '/' ) ); ?>/editor/php/upload_json.php?dir=image',
					afterUpload : function(data) {
						if (data.error === 0) {
							var url = K.formatUrl(data.url, 'absolute');
							K('#jiapic').val(url);
						} else {
							alert(data.message);
						}
					},
					afterError : function(str) {
						alert('自定义错误信息: ' + str);
					}
				});
				uploadbutton.fileBox.change(function(e) {
					uploadbutton.submit();
				});
			});
		</script>
<script> 
      function synchronize(){
		document.getElementById('i1').poster =document.getElementById('jiapic').value;
		document.getElementById('i1').src =document.getElementById('jiapic').value;
		/*input传递参数至src，以此类推*/
      } 
        setInterval(synchronize,1000);//1000是1秒刷新一次。
</script>