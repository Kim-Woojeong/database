<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<link rel="stylesheet" href="../../styles/register.css">
<link href="https://fonts.googleapis.com/css?family=Nanum+Gothic|Noto+Sans+KR&display=swap&subset=korean"
rel="stylesheet">
<link href="../../styles/common.css" type="text/css" rel="stylesheet" />
<link href="../../styles/register.css" type="text/css" rel="stylesheet" />
<title>Sign-Up</title>

<head>
	<title>register</title>
</head>

<body>
<?php
  include "../employee/navigator.php";
  ?>

  <div id="wrapper">
    <!-- <hr /> -->

    <form id="signInForm" action="DEVregister.php" method="post">
     <div class="signIn">

      <div id="inputArea">

        <h2 class="big">직원추가</h2>

        <div class="input_box">
          <label>
           <input class="input_text" id="user_Student_ID" type="text" name="ID" placeholder="ID">
         </label>
       </div>

			 <div class="input_box">
				 <label>
					<input class="input_text" id="user_Student_ID" type="text" name="name" placeholder="name">
				</label>
			</div>

			<div class="input_box">
				<label>
				 <input class="input_text" id="user_Student_ID" type="text" name="ssn" placeholder="주민번호">
			 </label>
		 </div>

		 <div class="input_box">
			 <label>
				<input class="input_text" id="user_Student_ID" type="text" name="hp" placeholder="핸드폰번호">
			</label>
		</div>

		<div class="input_box">
			<label>
			 <input class="input_text" id="user_Student_ID" type="text" name="account_num" placeholder="계좌번호">
		 </label>
	 </div>

		<div class="input_box">
	   <h2 class="big">지점입력</h2>
	   <div class="location">
	     <span class="selWrap">
	       <select class="sel" name="selectedQuestion">
	         <option value="1000000">안산 중앙 1호점</option>
	         <option value="1000001">zx여수xz</option>
	         <option value="1000002">강남</option>
	         <option value="1000003">제주</option>
	         <option value="1000004">울릉도</option>
	       </select>
	     </span>
	   </div>
	 </div>

	 <div class="input_box">
		<h2 class="big">부서</h2>
		<div class="location">
			<span class="selWrap">
				<select class="sel" name="selectedQuestion1">
					<option value="아르바이트생">아르바이트생</option>
					<option value="영화관장">영화관장</option>
				</select>
			</span>
		</div>
	</div>


</div>

<div class="btn">
 <button type="submit" id="signUpBtn"> Sign Up </button>
</div>

</div>
</form>
</div>
</body>

</html>
