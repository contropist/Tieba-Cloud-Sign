<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }
if (option::get('enable_reg') != 1) {
    $text = option::get('stop_reg');
  if(!empty($text)){
      msg($text);
  } else {
      msg('该站点已关闭注册');
  }
}
loadhead();

?>
<div class="panel panel-success" style="margin:1% 1% 1% 1%;">
	<div class="panel-heading">
          <h3 class="panel-title">注册 <?php echo SYSTEM_NAME ?></h3>
    </div>
    <div style="margin:0% 5% 5% 5%;">
	<div class="login-top"></div><br/><?php doAction('reg_page_1'); ?>
	<b>请输入您的账号信息以注册本站</b><br/><br/>
        <?php if (isset($_GET['error_msg'])): ?><div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            错误：<?php echo strip_tags($_GET['error_msg']); ?></div><?php endif;?>
        <?php if (isset($_GET['msg'])): ?><div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <?php echo strip_tags($_GET['msg']); ?></div><?php endif;?>
  <form name="f" method="post" action="index.php?mod=admin:reg" onsubmit="if($('#rpw').val() != $('#pw').val()) {alert('注册失败：两次输入的密码不一致，请重新输入');return false;}">
	<div class="input-group">
  <span class="input-group-addon">用户名</span>
  <input type="text" class="form-control" name="user" required>
</div><br/>
      <div class="input-group">
          <span class="input-group-addon">密码</span>
          <input type="password" class="form-control" name="pw" id="pw" required>
      </div><br/>
      <div class="input-group">
          <span class="input-group-addon">再次输入密码</span>
          <input type="password" class="form-control" name="rpw" id="rpw" required>
      </div><br/>
<div class="input-group">
  <span class="input-group-addon">邮箱地址</span>
  <input type="email" class="form-control" name="mail" id="mail" required>
</div>
<?php
$yr_reg = option::get('yr_reg');
if (!empty($yr_reg)) { ?>
<br/>
<div class="input-group">
  <span class="input-group-addon">邀请码</span>
  <input type="text" class="form-control" name="yr" id="yr" required>
</div>
<?php } ?>
      <?php if(option::get('captcha')): ?>
          <script>
              $(function(){
                  $('#captcha').on('load', function(){
                      $('#captcha_input').removeAttr('disabled').attr({'value':''});
                  }).on('click', function(){
                      $('#captcha_input').attr({'disabled':'disabled', 'value':'刷新中…'});
                      $(this).attr('src', 'index.php?mod=captcha');
                  });
              });
          </script>
          <br>
          <img src="index.php?mod=captcha" alt="验证码" class="img-thumbnail" id="captcha" style="cursor: pointer; float: right; margin-left: 10px; margin-bottom: 10px;">
          <div class="input-group" style="margin-bottom: 5px">
              <span class="input-group-addon">验证码</span>
              <input type="text" class="form-control" name="captcha" id="captcha_input" required>
          </div>
      <?php endif; ?>
	<div class="login-button"><br/>
	<?php doAction('reg_page_2'); ?>
  <button type="submit" class="btn btn-primary" style="width:100%;float:left;">继续注册</button>
  <?php doAction('reg_page_3'); ?>
	</div><br/><br/><br/>
	<?php echo SYSTEM_FN ?> V<?php echo SYSTEM_VER ?> <?php echo SYSTEM_VER_NOTE ?> // 作者: <a href="https://kenvix.com" target="_blank">Kenvix</a> &amp; <a href="http://www.mokeyjay.com/" target="_blank">mokeyjay</a> &amp;  <a href="http://fyy1999.lofter.com/" target="_blank">FYY</a>
	<?php
	$icp=option::get('icp');
    if (!empty($icp)) {
      echo ' | <a href="http://beian.miit.gov.cn/" target="_blank">'.$icp.'</a>';
    }
    echo '<br/>'.option::get('footer');
    doAction('footer');
    ?>
	<div style=" clear:both;"></div>
	<div class="login-ext"></div>
	<div class="login-bottom"></div>
</div>
