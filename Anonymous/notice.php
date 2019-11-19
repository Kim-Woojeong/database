<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf-8" />
	<title>TESTER</title>
  <link rel="stylesheet" type="text/css" href="notice.css">
</head>
<body>
  <!-- javascript -->
  <script>
    function SirenFunction(idMyDiv){
      var objDiv = document.getElementById(idMyDiv);
      if(objDiv.style.display=="block"){ objDiv.style.display = "none"; }
      else{ objDiv.style.display = "block"; }
    }
  </script>
  <main>
    <div class="container">
     <div class="contents">
      <div>
        <h1>NOTICE</h1>
      </div>

      
      <ul id="board">
        <li class="header">
          <ul>
            <li class="name pull-left">ID</li>
            <li class="time pull-left">Date</li>
          </ul>
        </li>
        

        <div>
          <li class="entry">
            <div class="information">
              <?php
              try {
                $conn = new PDO("mysql:host=$servername;dbname=zxcinemaxz", 'root', 'root');
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT * FROM notice");
                $stmt->execute();
                foreach($stmt->fetchAll() as $k=>$v) { ?>
                  <a href="#" onclick="SirenFunction('SirenDiv<?php echo $k; ?>'); return false;" class="blind_view"><ul> <?php
                  echo "<li  class='title pull-left'>" . $v[notice_id] . "</li>";
                  echo "<li  class='date pull-left'>" . $v[notice_date] . "</li>";
                  ?> </a>
                  <div class="singo_view pull-left" style="display:none; background-color: pink; width: 100%;" id="SirenDiv<?php echo $k;?>" ><?php echo $v['content']; ?></div></ul> <?php
                }
                  echo "<button onclick=\"location.href='newnotice.php'\" >" . "글쓰기" . "</button>";
              }
              catch(PDOException $e)
              {
                echo "<ul>";
                echo "<li>" . "Connection failed: " . $e->getMessage() . "</li>";
                echo "</ul>";
              }
              ?>
            </div>
          </li>
        </div>
      </ul>
    </main>
 </body>
 <?php $conn = null; // disconnect db ?> 
 </html>
