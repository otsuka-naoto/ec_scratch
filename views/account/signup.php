<?php  $this->setLayoutVar('title','アカウント登録画面') ?> 
<h2>アカウント登録画面</h2>
 <form action="<?php  echo $base_url; ?>/account/register" method="post">
 </br>
 ID:<input type="text" name="name"/>
 </br>
 Pass: <input type="text" name="pass"/>
 </br>
 <input type="submit" value="login"/>
 </form>
