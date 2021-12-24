<style type="text/css">
.km-li {
    float: left;
    border: 1px solid #eee;
	padding: 0;
	margin: 0 auto;
    font-size: 14px;
    font-weight: 400;
    vertical-align: middle;
	position: relative;
    display: inline;
}
.km-bar {
margin:0;
padding:0;
font-size: 0;
background: #FFF;
z-index: 9;
border-top: 0px solid #e0e0e0;
}
.km-bar a {
cursor: pointer;
color: #5D656B;
display: table-cell;
text-align: center;
text-decoration: none;
}
.km-bar a i {
margin-top: -2px;
text-align: center;
vertical-align: middle;
background-repeat: no-repeat;
background-size: 100%;
display: inline-block;
width: 90px;
height: 90px;
}
.km-bar a span {
display: block;
color: #333;
margin-top: -6px;
font-size: 14px;
}
.nbsp {
  padding-right:5px;
}
.input, input[type="text"] {
  padding: 0;
  margin: 0;
  width:60%;
  color: #555;
  font-size: 14px;
  padding: 3px;
  border: 1px solid #e5e5e5;
  background: #fbfbfb;
}
input[type="button"] {
    background-position: right -25px;
    padding: 0 14px 0 12px;
    margin: 0 0 0 2px;
    font-family: "sans serif",tahoma,verdana,helvetica;
    border: 0 none;
    color: #333;
    font-size: 12px;
    text-decoration: none;
	background: url(background.png) no-repeat;
    cursor: pointer;
    height: 23px;
    line-height: 23px;
    overflow: visible;
    display: inline-block;
    vertical-align: top;
}
</style>
<?php echo '<div class="km-bar"><ul style="display: inline-block;overflow: auto;">
<li class="btn btn-default km-li" style="width:33%;border-top-left-radius: 15px;border-bottom-left-radius: 15px;"><a href="' . get_bloginfo('url') . '"><i style="background-image: url('.plugin_dir_url(__FILE__ ). 'img/home.png);"></i><span>' . __( 'HOME', 'mediaplus' ) . '</span></a></li>
<li class="btn btn-default km-li" style="width:33%;"><a href="#"><i style="background-image: url('.plugin_dir_url(__FILE__ ). 'img/media.png);"></i><span>' . __( 'MEDIA', 'mediaplus' ) . '</span></a></li>
<li class="btn btn-default km-li" style="width:33%;border-top-right-radius: 15px;border-bottom-right-radius: 15px;"><a href="https://keepmeet.com/"><i style="background-image: url('.plugin_dir_url(__FILE__ ). 'img/vip.png);"></i><span>' . __( 'PLUS', 'mediaplus' ) . '</span></a></li></ul></div><br />'; ?>
<?php echo '<span><a href="'.get_bloginfo('url').'/author/'.$current_user->user_nicename.'" target="_self">View My Video</a></span>'; ?><br />