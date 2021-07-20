<!DOCTYPE html>
<html>
<head>
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="login.php">LOG IN</a></li>
    </ul>
</nav>
<h1>REGISTRATION</h1>
<p>Already have account?<a href="login.php">LOGIN HERE!</a></p>
<?php require "registervalidation.php";?>
<form id="registerform"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="POST">
<label for="firstname">Firstname: </label> 
<input type="text" id="firstname" name="firstname" value="<?php echo $fname;?>"> 
<span class="error"><?php if(isset($fnameErr)) {echo $fnameErr;}?></span>
<br/><br/>
<label for="lastname">Lastname: </label> 
<input type="text" id="lastname" name="lastname" value="<?php echo $lname;?>">
<span class="error"><?php if(isset($lnameErr)) {echo $lnameErr;}?></span>
<br/><br/>
<label for="email"> Email: </label> 
<input type="text" id="email" name="email" value="<?php echo $email;?>" >
<span class="error"><?php if(isset($emailErr)) {echo $emailErr;}?></span>
<br/><br/>
<label for="mobilenum">Phone number: </label> 
<input type="text" id="mobilenum" name="mobilenum" value="<?php echo $mobileNum;?>">
<span class="error"><?php if(isset($mobileNumErr)) {echo $mobileNumErr;}?></span>
<br/><br/>
<label for="password">Password: </label> 
<input type="password" id="password" name="password" value="<?php echo $pass;?>" >
<span class="error"><?php if(isset($passErr)) {echo $passErr;}?></span>
<br/><br/>
<label for="cpassword"> Confirm password: </label> 
<input type="password" id="cpassword" name="cpassword" value="<?php echo $cpass;?>">
<span class="error"><?php if(isset($cpassErr)) {echo $cpassErr;}?></span>
<br/><br/>
<button type="submit" name="submit" value="submit">REGISTER</button>
</form>
</body>
<script type="text/javascript">
$( "#registerform" ).validate({
    rules: {
        firstname: {
            required: true
        },
        lastname: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        mobilenum: {
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10
        },
        password: {
            required: true,
            minlength: 10
        },
        cpassword: {
            required: true,
            minlength: 10,
            equalTo: "#password"
        }
    },
    messages: {
        firstname: {
            required: "enter first name"
        },
        lastname: {
            required: "enter last name"
        },
        email: {
            required: "enter emial id",
            email: "enter valid email id"
        },
        mobilenum: {
            required: "enter phone number",
            number: "only numbers are allowed",
            minlength: "must contain only 10 characters",
            maxlength: "must contain only 10 characters"
        },
        password: {
            required: "enter password",
            minlength: "password must have atleast 10 characters"
        },
        cpassword: {
            required: "enter confirm password",
            minlength: "password must have atleast 10 characters",
            equalTo: "mismatch in the password"
        }
    }
});
</script>
</html> 