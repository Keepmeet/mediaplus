			<!-- 关于表单样式，请自行调整-->
			<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; $current_user = wp_get_current_user(); ?>">
				
                    <?php require 'upvideo.php';require 'upimg.php'; ?>

			    <div style="text-align: center; padding-top: 10px;">
			        <label class="nbsp" for="tougaocategorg"><?php _e( 'Cate', 'mediaplus' ); ?></label>
			        <?php wp_dropdown_categories('hide_empty=0&id=tougaocategorg&show_count=1&hierarchical=1&selected=1'); ?>
			    </div>
				
				<div style="text-align: center; padding-top: 10px;">
			        <label class="nbsp" for="tougao_tags"><?php _e( 'Tags', 'mediaplus' ); ?></label>
			        <input type="text" class="input" placeholder="<?php _e( '#country,#thing', 'mediaplus' ); ?>" id="tougao_tags" name="tougao_tags" />
			    </div>

			    <div style="text-align: center; padding-top: 10px;">
			        <label class="nbsp" for="tougao_content"><?php _e( 'Feel', 'mediaplus' ); ?></label>
			        <textarea rows="3" cols="20" class="input" placeholder="<?php _e( 'Mark this moment', 'mediaplus' ); ?>" id="tougao_content" name="tougao_content" onkeyup="document.getElementById('tougao_title').value=this.value.substring(0,50)" onblur="document.getElementById('tougao_title').value=this.value.substring(0,50)" wrap="virtual"></textarea>
			    </div>

			    <br clear="all">
			    <div style="text-align: center; padding-top: 10px;">
			        <input type="hidden" value="send" name="tougao_form" />
			        <input class="btn btn-primary" type="submit" value="<?php _e( 'Post', 'mediaplus' ); ?>" />
			        <input class="btn btn-primary" type="reset" value="<?php _e( 'Reset', 'mediaplus' ); ?>" />
			    </div>
			</form>