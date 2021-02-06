<?php  $this->setLayoutVar('title','アカウント登録画面') ?> 
<h2>アカウント登録画面</h2>
 <form action="<?php echo $base_url; ?>/account/register" method="post">
 </br>
 ID:<input type="text" name="name" value="<?php echo $user_name; ?>" />
 </br>
 Pass: <input type="text" name="pass"/>
 </br>
 <input type="submit" value="login"/>

<div id="app-1">{{ message }}</div>  <!-- {{ message }} が Vueデータに置換される -->

<script>
var app1 = new Vue({
  el: '#app-1',                        /* #app-1 要素に対して Vue を適用する */
  data: { message: 'Hello world!' }    /* message という名前のデータを定義する */
})
</script>
 </form>
