<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php $hour=date('H'); ?> 
 <?php if(5<=$hour && $hour<10): ?> 
    <p>good morning!</p>
 <?php else: ?> 
    <p>good afternoon!</p>
 <?php endif; ?>
 <form action="db.php" method="post">
 let's write your name!
 <input type="text" name="name"/>
 <input type="submit" value="submit"/>
 </form>
 </body>
</html>