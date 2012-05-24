<section id="contact">
  <h2 class="page-title">Contact</h2>
  <article>

<?php

if (!isset($_POST['submitted'])) {
	$_POST['submitted'] = NULL;
}

if (is_numeric($_POST['submitted'])) {
  $submitted = $_POST['submitted'];
  $keyid = $_POST['keyid'];
  if ($keyid != '') {
    $submitted = 0;
  }
}
else {
  $submitted = 0;
  $dispError = 0;
  $nameError = 0;
  $emailError = 0;
  $subjectError = 0;
  $messageError = 0;
}

if ($submitted == 1) {

  // Initialize variables 
  $name = '';
  $email = '';
  $subject = '';
  $message = '';

  // Get posted variables from form
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
  
  $error = 'I\'m sorry, there was an error in your submission. Please correct the following and try again:<ul>';
  $dispError = 0;
  $nameError = 0;
  $emailError = 0;
  $subjectError = 0;
  $messageError = 0;
  if($name == '') {
    $error .= '<li><strong>Name</strong> is a required field.</li>';
    $dispError = 1;
    $nameError = 1;
  }

  if(!filter_var($email, FILTER_VALIDATE_EMAIL) || $email == '') {
    $invalidemail = $email;
    $email = '';
    $error .= '<li><strong>The email address is invalid.</strong></li>';
    $dispError = 1;
    $emailError = 1;
  }
  
  if($subject == '') {
    $error .= '<li><strong>Subject</strong> is a required field.</li>';
    $dispError = 1;
    $subjectError = 1;
  }
  
  if($message == '') {
    $error .= '<li><strong>Message</strong> is a required field.</li>';
    $dispError = 1;
    $messageError = 1;
  }
  $error .= '</ul>';
  
  if ($dispError == 0) {
  		
  	// Clean up injection stuff
		$email = preg_replace("([\r\n])", "", $email);
		$find = "/(content-type|bcc:|cc:)/i";
		if (preg_match($find, $name) || preg_match($find, $email) || preg_match($find, $subject) || preg_match($find, $message)) {
			echo "<h1>Error</h1>\n
			<p>No meta/header injections, please.</p>";
			exit;
		}
  
    // Send email here   
    $headers = 'From: junc@juncmodule.com' . "\r\n" .
    'Reply-To: junc@juncmodule.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    // Add on the name
    $message = $name . ' says:<br /><br />' . $message;
    
    // make sure each line doesn't exceed 70 characters
    $message = wordwrap($message, 70);
    
    if (mail($email, $subject, $message, $headers)) {
	    echo("<p>Message successfully sent!</p>");
	  }    
  }

} 

?>

<?php 
	if ($dispError == 0 && $submitted == 1) {
		print 'Thank you for contacting us. We will reply as soon as possible.<br /><br />';
		print '<a href="/" title="Return to the home page.">Back to the Welcome page</a>';
	}
	else {
	?>

		<p style="border: 1px solid #000; background-color: #fff; padding: 20px;">This form is being wonky, it might not be working right now. Just contact me on twitter or facebook (links in the footer) until I stop being a terrible developer.</p>
    <form id="contactform" name="contact" action="/contact" method="post">
      
        <?php
	        if ($dispError == 1) {
		      	print '<span class="form-error">' . $error . '</span>'; 
		      }
        ?>
        
        <label><strong>Your name</strong>:</label>
        <sup style="color: red;">*</sup><br />
        <input <?php if($nameError == 1) { echo 'style="border: 2px solid #f00;"'; } ?> type="text" name="name" size="40" tabindex="1" <?php if($dispError == 1) { echo 'value="' . $name . '"'; } ?> />
        <br />
        <span style="font-size: .75em; color: #ccc;">Please enter your name.</span>
        <br /><br />
        
        <label><strong>Your email address</strong>:</label>
        <sup style="color: red;">*</sup><br />
        <input <?php if($emailError == 1) { echo 'style="border: 2px solid #f00;"'; } ?> type="text" name="email" size="30" tabindex="2" <?php if($dispError == 1) { echo 'value="' . $invalidemail . '"'; } ?> />
        <br />
        <span style="font-size: .75em; color: #ccc;">Enter a valid email address.</span>
        <br /><br />
        
        <label><strong>Subject</strong>:</label>
        <sup style="color: red;">*</sup><br />
        <input <?php if($subjectError == 1) { echo 'style="border: 2px solid #f00;"'; } ?> type="text" name="subject" size="40" tabindex="3" <?php if($dispError == 1) { echo 'value="' . $subject . '"'; } ?> />
        <br />
        <span style="font-size: .75em; color: #ccc;">Enter the subject of your message.</span>
        <br /><br />
        
        <label><strong>Message</strong>:</label>
        <sup style="color: red;">*</sup><br />
        <textarea <?php if($messageError == 1) { echo 'style="border: 2px solid #f00;"'; } ?> name="message" rows="10" cols="30" tabindex="4"><?php if($dispError == 1) { echo $message; } ?></textarea>
        <br />
        <span style="font-size: .75em; color: #ccc;">Enter your message.</span>
        <br /><br />
        
        <input type="hidden" name="keyid" />
        <input type="hidden" name="submitted" value="1" />
        <?php /*
          require_once('libraries/recaptchalib.php');

          // Get a key from https://www.google.com/recaptcha/admin/create
          $publickey = "6LfHgr4SAAAAANjAsCHtfkmrCncpE-YxlPd58NxN";
          $privatekey = "6LfHgr4SAAAAAFAx76dVX73etGT74af3cl98Z7hC";

          # the response from reCAPTCHA
          $resp = null;
          # the error code from reCAPTCHA, if any
          $error = null;

          # was there a reCAPTCHA response?
          if ($_POST["recaptcha_response_field"]) {
            $resp = recaptcha_check_answer (
              $privatekey,
              $_SERVER["REMOTE_ADDR"],
              $_POST["recaptcha_challenge_field"],
              $_POST["recaptcha_response_field"]
            );

            if ($resp->is_valid) {
              echo "You got it!";
            } else {
              # set the error code so that we can display it
              $error = $resp->error;
            }
          }
          echo recaptcha_get_html($publickey, $error);
          echo '<br />';
        */ ?>
        <input type="submit" value="Submit" tabindex="5" />
    </form>

<?php
	}
?>

  </article>
</section>

