<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php $hour=date('H'); ?> 
 <?php if(5<=$hour && $hour<10): ?> 
    <p>Good morning!</p>
 <?php else: ?> 
    <p>Good afternoon!</p>
 <?php endif; ?>
 <form action="user_regist_db.php" method="post">
 Let's write your name and pass!
 </br>
 Name:<input type="text" name="name"/>
 </br>
 Pass: <input type="text" name="pass"/>
 </br>
 <input type="submit" value="登録"/>
 </form>
 </body>
</html>