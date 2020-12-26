<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php $hour=date('H'); ?> 
 <?php if(5<=$hour && $hour<10): ?> 
    <p>こんにちは!</p>
 <?php else: ?> 
    <p>こんばんは!</p>
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
 <ul>
<?php foreach(((new PDO('mysql:dbname=mysql;host=localhost;charset=utf8','root', 'root')) -> query("select * from mst_user ")) as $row): ?>
<li>
<?php echo htmlspecialchars($row['Id'], ENT_QUOTES, 'UTF-8'); ?> - 
<?php echo htmlspecialchars($row['Name'], ENT_QUOTES, 'UTF-8'); ?> - 
<?php echo htmlspecialchars($row['Pass'], ENT_QUOTES, 'UTF-8'); ?> 
</li>
<?php endforeach ?>
</ul>
 </body>
</html>