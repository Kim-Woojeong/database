<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<link rel="stylesheet" href="../../styles/register.css">
<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Noto+Sans+KR&display=swap&subset=korean"
rel="stylesheet">
<link href="../../styles/common.css" type="text/css" rel="stylesheet" />
<link href="../../styles/make_coupon.css" type="text/css" rel="stylesheet" />

<head>
	<title>쿠폰생성</title>
</head>

<body>
<?php
  include "../employee/navigator.php";
  ?>

  <div id="wrapper">
    <!-- <hr /> -->

    <form id="signInForm" action="make_couponok.php" method="post">
     <div class="signIn">

      <div id="inputArea">

        <h2 class="big">쿠폰만들기</h2>

        <div class="input_box">
          <label>
           <input class="input_text" type="text" name="name" placeholder="쿠폰이름">
         </label>
       </div>

			 <div class="input_box">
			  <h2 class="big">종류</h2>
			  <div class="rate">
			    <span class="selWrap">
			      <select class="sel" name="selecte1">
			        <option value="영화">영화</option>
			        <option value="음식">음식</option>
			        <option value="영화&음식">영화&음식</option>
			      </select>
			    </span>
			  </div>
			</div>

		 <div class="input_box">
		  <h2 class="big">할인비율</h2>
		  <div class="rate">
		    <span class="selWrap">
		      <select class="sel" name="selecte2">
		        <option value="10.0">10%</option>
		        <option value="15.0">15%</option>
		        <option value="25.0">25%</option>
		        <option value="50.0">50%</option>
		        <option value="70.0">70%</option>
		        <option value="90.0">90%</option>
		      </select>
		    </span>
		  </div>
		</div>


		<div class="btn">
		 <button type="submit" id="signUpBtn"> 쿠폰생성 </button>
		</div>

</div>
</form>
</div>
</body>

</html>
