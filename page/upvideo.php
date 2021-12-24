<div style="text-align: center; padding-top: 10px;">
<video id = "i1" width="200" height="200" controls="controls"></video><br/>
<label for="tougao_link"></label>
<input class="ke-input-text" type="text" id="url" name="tougao_link" value="" placeholder="<?php _e( 'Your Video(<50M)', 'mediaplus' ); ?>" />
<input type="button" id="uploadButton" value="<?php _e( 'upvideo', 'mediaplus' ); ?>" />
</div>
	<link rel="stylesheet" href="<?php echo esc_url( home_url( '/' ) ); ?>editor/themes/default/default.css" />
	<script src="<?php echo esc_url( home_url( '/' ) ); ?>editor/kindeditor-all-min.js"></script>
		<script>
			KindEditor.ready(function(K) {
				var uploadbutton = K.uploadbutton({
					button : K('#uploadButton')[0],
					fieldName : 'imgFile',
					url : '<?php echo esc_url( home_url( '/' ) ); ?>/editor/php/upload_json.php?dir=media',
					afterUpload : function(data) {
						if (data.error === 0) {
							var url = K.formatUrl(data.url, 'absolute');
							K('#url').val(url);
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
        document.getElementById('i1').src =document.getElementById('url').value; 
		/*input传递参数至src，以此类推*/
      } 
        setInterval(synchronize,3000);//1000是1秒刷新一次。
</script>