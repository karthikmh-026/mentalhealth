<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<title>INNER VOICE</title>
	<link rel="stylesheet" href="login.css">
	<script>
		function togglePasswordConditions() {
      var passwordConditions = document.getElementById("password-conditions");
      passwordConditions.style.display = passwordConditions.style.display === "none" ? "block" : "none";
    }
		function valfun(){
		var c = document.getElementById("email").value;
		var a = document.getElementById("spassword").value;
		var b = document.getElementById("cpassword").value;
		 let alphabet = /[a-zA-Z]/, //letter a to z and A to Z
      numbers = /[0-9]/, //numbers 0 to 9
      scharacters = /[!,@,#,$,%,^,&,*,?,_,(,),-,+,=,~]/; //special characters
  input.addEventListener("keyup", ()=>{
    indicator.classList.add("active");
    let val = input.value;
    if(val.match(alphabet) || val.match(numbers) || val.match(scharacters)){
      text.textContent = "Password is weak";
      input.style.borderColor = "#FF6333";
      showHide.style.color = "#FF6333";
      iconText.style.color = "#FF6333";
    }
    if(val.match(alphabet) && val.match(numbers) && val.length >= 6){
      text.textContent = "Password is medium";
      input.style.borderColor = "#cc8500";
      showHide.style.color = "#cc8500";
      iconText.style.color = "#cc8500";
    }
    if(val.match(alphabet) && val.match(numbers) && val.match(scharacters) && val.length >= 8){
      text.textContent = "Password is strong";
      input.style.borderColor = "#22C32A";
      showHide.style.color = "#22C32A";
      iconText.style.color = "#22C32A";
    }
    if(val == ""){
      indicator.classList.remove("active");
      input.style.borderColor = "#A6A6A6";
      showHide.style.color = "#A6A6A6";
      iconText.style.color = "#A6A6A6";
    }
  });
	
	
      // Minimum password length requirement
      var minLength = 8;

      // Regular expression patterns for password validation
      var uppercaseRegex = /[A-Z]/;
      var lowercaseRegex = /[a-z]/;
      var digitRegex = /[0-9]/;
      var specialCharRegex = /[!@#$%^&*]/;

      // Check the minimum length requirement
      if (a.length < minLength) {
        alert("Password must be at least 8 characters long.");
        return false;
      }

      // Check for at least one uppercase letter
      if (!uppercaseRegex.test(a)) {
        alert("Password must contain at least one uppercase letter.");
        return false;
      }

      // Check for at least one lowercase letter
      if (!lowercaseRegex.test(a)) {
        alert("Password must contain at least one lowercase letter.");
        return false;
      }

      // Check for at least one digit
      if (!digitRegex.test(a)) {
        alert("Password must contain at least one digit.");
        return false;
      }

      // Check for at least one special character
      if (!specialCharRegex.test(a)) {
        alert("Password must contain at least one special character.");
        return false;
      }
	  
		if(a!=b){
			alert("PASSWORDS DOES NOT MATCH!");
			return false;
		}

      // Password has passed all validation checks
      return true;
    }
	
	</script>
</head>
<body>
	<header>
		<h1 class="heading">INNER VOICE</h1>
		<h5 class="title">welcome to your own space</h5>
	</header>
	<div class="container">
		<!-- upper button section to select
			the login or signup form -->
		<div class="slider"></div>
		<div class="btn">
			<button class="login">Login</button>
			<button class="signup">Signup</button>
		</div>

		<!-- Form section that contains the
			login and the signup form -->
			<form action="ldata.php" method="post">
		<div class="form-section">
             <!-- login form -->
			<div class="login-box">
				<input type="email"
					class="email ele"
					name="email"
					placeholder="your email-Id" required>
			                                                                                                                                                                                                                                                                                                                                                                                           
					<div class="pcontainer">
		        <input type="password"
			        class="password ele"
					name="password"
		            placeholder="password"
			         id="password" required>
			<i class ="fa-solid fa-eye" id="eye"></i></div>
			<button class="clkbtn">Login</button>
			</div>
		</form>
			<!-- signup form -->
			<form action="sdata.php" method="POST" onsubmit="return valfun()">
			<div class="signup-box">
				 <input type="text" 
				 name="firstname"
				   class="name ele"
				   id="username"
				  placeholder="Username" required>
				  <input type="email"
				  name="email"
					class="email ele"
					id="email"
					placeholder="youremail@gmail.com" required>
				 <div class="pcontainer">
				  <input type="password"
				  name="password"
					class="password ele"
					placeholder="password"
			     	id="spassword" required>
				<div class="m"><i class="fas fa-exclamation-triangle" onclick="togglePasswordConditions()"></i></div>
					<i class ="fa-solid fa-eye" id="confieye"></i></div>
					
  <div id="password-conditions" class="password-conditions">
    <ul>
      <li>Password must be at least 8 characters long.</li>
      <li>Password must contain at least one uppercase.</li>
      <li>Password must contain at least one digit & special character.</li>
      
    </ul>
  </div>
			 <div class="pcontainer">
				<input type="password"
				name="confirmpassword"
					class="password ele"
					placeholder=" confirm password"
				id="cpassword">
				<i class ="fa-solid fa-eye" id="ceye"></i></div>
			 </form>
				
				<button class="clkbtn">Signup</button>
			</div>
		</div>
	</div>
	<script src="login.js"></script>
</body>
</html>