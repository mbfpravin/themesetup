<?php
/**********
Template Name: Contact Us
**********/

get_header();

global $wpdb;
global $_POST;
?>
<?php

if ($_POST['contact_us_form'] != "" && $_POST['contactform'] == "") {
$table = $wpdb->prefix . "contact";
    $data['firstname']        = sanitize_text_field($_POST['firstname']);
    $data['email']            = sanitize_text_field($_POST['email']);
    $data['organization']     = sanitize_text_field($_POST['organization']);
    $data['telephone']        = sanitize_text_field($_POST['telephone']);
    $data['message']          = nl2br($_POST['message']);
    $data['address']        = nl2br($_POST['address']);
    /*$data['state']        = sanitize_text_field($_POST['state']);
    $data['city']        = sanitize_text_field($_POST['city'])*/;
    $data['existing_customer']          = sanitize_text_field($_POST['existing_customer']);
    $data['posted_date']      = date('Y-m-d H:i:s');
    $data['firstname'] = ucwords($data['firstname']);
    $format = array('%s','%s','%s','%s','%s','%s','%s');
    $err = 0;
        if (empty($data['firstname'])) {
            $error['firstname'] = "Please enter your name";
            $err++;
        }
        if (empty($data['telephone'])) {
            $error['telephone'] = "Please enter your telephone number";
            $err++;
        }
        if (empty($data['organization'])) {
            $error['organization'] = "Please enter your organization name";
            $err++;
        }
        if (empty($data['email'])) {
            $error['email'] = "Please enter your email";
            $err++;
        }
        if (empty($data['message'])) {
            $error['message'] = "Please enter your message";
            $err++;
        }
/*        if (empty($data['state'])) {
            $error['state'] = "Please select your state";
            $err++;
        }
        if (empty($data['city'])) {
            $error['city'] = "Please enter your city";
            $err++;
        }*/
        if (empty($data['address'])) {
            $error['address'] = "Please enter your address";
            $err++;
        }
        if (empty($data['existing_customer'])) {
            $error['existing_customer'] = "Please choose whether you are a existing customer or not";
            $err++;
        }
        if (empty($err)) {
            $insert_contact = $wpdb->insert($table, $data, $format);
            $lastid = $wpdb->insert_id;
            if($lastid != "") { ?>
                <?php $message = '
                <html>
                    <body>
                        <div style="max-width:500px">
                            <p>Dear,<br /><br />

                            The following message was submitted through the website today.<br /><br />

                           ---- Message ----<br /><br />

                                Name - '. $data['firstname'] .'<br />
                                Email - ' . $data['email'] . ' <br />
                                Organization - ' . $data['organization'] . ' <br />
                                Phone - ' . $data['telephone'] . '<br />
                                Address -' .$data['address'] . '<br />
                                Existing Customer - ' . $data['existing_customer'] . ' <br />
                                Message - '. $data['message'] . '<br />
                            </p>
                        </div>
                    </body>
                </html>'
            ?>
            <?php $senderMessage = '
                <html>
                    <body>
                        <div style="max-width:500px">
                            <p>Dear '. $data['firstname'] .',<br /><br />

                               Thank you for writing to us. We have forwarded your email to the
                               right department and you should get an answer back in 48 hours.<br /><br />

                               Regards,<br /><br />

                               Team CR<br /><br />

                               ---- Your message ----<br /><br />

                               Name - '. $data['firstname'] .' <br />
                               Email - ' . $data['email'] . ' <br />
                               Organization - ' . $data['organization'] . ' <br />
                               Phone - ' . $data['telephone'] . ' <br />
                               Address -' .$data['address'] . '<br />
                               Existing Customer - ' . $data['existing_customer'] . ' <br />
                               Your Message - ' . $data['message'] . ' <br />
                            </p>
                        </div>
                    </body>
                </html>';
                $from = "CR <no-reply@cr.in>";
                $subject = "Message from the CR website";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
                $headers .= "From: " .  $from."\r\n";
                $to = get_option('contact_us_email');
                if (wp_mail($to, $subject, $message, $headers)) {
                    $to = $data['email'];
                    $subjectSender ="CR - Your message has been received.";
                    if (wp_mail($to, $subjectSender, $senderMessage, $headers)) {
                        unset($_POST);
                        $redirect_url = get_bloginfo('url') . "/contact/thank-you/";
                        wp_redirect( $redirect_url );
                        exit;
                    }
                }
            }
        }
    }
?>
<?php
get_sidebar('banner');
?>
<section class="section-with-skews">
    <div class="skewed-badge"></div>
    <div class="container contact-us">
        <div class="col-10 center-block">
            <div class="form-intro">
                <?php echo $post->post_content; ?>
            </div>
            <div class="row">
                <div class="col-7">
                    <div class="form">
                        <form name="contact_us_frm" id="contact_us_frm" method="post" action="#">
                            <?php wp_nonce_field('conactus_nonce','contact_us_form'); ?>
                            <div class="form-row">
                                <label class="floating-item" data-error="Please enter your name">  
                                    <input type="text" class="floating-item-input input-item" name="firstname" maxlength="75" onkeypress="return onlyAlphabets(event, this)" id="firstname" value="" />
                                    <span class="floating-item-label">Name</span>
                                </label>
                                <div class="error-message" id="err_firstname"> <?php echo $error['firstname'];?> </div>                                           
                            </div>
                            <div class="form-row">
                                <label class="floating-item" data-error="Please enter your email address">
                                    <input type="text" class="floating-item-input input-item validate-email" maxlength="100" name="email" id="email" value="" />
                                    <span class="floating-item-label">Email Address</span>
                                </label> 
                                <div class="error-message" id="err_login_email"><?php echo $error['email'];?></div>
                            </div>
                            <div class="form-row">
                                <label class="floating-item" data-error="Please enter your organization name">  
                                    <input type="text" class="floating-item-input input-item" name="organization" id="organization" value="" />
                                    <span class="floating-item-label">Organization</span>
                                </label>
                                <div class="error-message" id="err_organization"> <?php echo $error['organization'];?> </div>                                           
                            </div>
                            <div class="form-row">
                                <label class="floating-item" data-error="Please enter your telephone number">
                                    <input type="text" class="floating-item-input input-item validate-mobile" name="telephone" maxlength="12" onkeypress="return isNumber(event)" id="telephone" value="" />
                                    <span class="floating-item-label">Telephone</span>
                                </label>
                                <div class="error-message" id="err_telephone"><?php echo $error['telephone'];?></div>                                                
                            </div>
                            <!-- <div class="form-row">
                                <label class="floating-item" data-error="Please select your state">
                                    <select name="state" class="floating-item-input input-item" id="state" required="required">
                                        <option value="">SELECT STATE</option>
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                        <option value="Daman and Diu">Daman and Diu</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Orissa">Orissa</option>
                                        <option value="Pondicherry">Pondicherry</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttaranchal">Uttaranchal</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="West Bengal">West Bengal</option>
                                    </select>
                                </label> 
                                <div class="error-message" id="err_state"><?php echo $error['state'];?></div>                                            
                            </div>
                            <div class="form-row">
                                <label class="floating-item" data-error="Please enter your city">
                                   
                                       <input type="text" class="floating-item-input input-item" name="city" maxlength="75" onkeypress="return onlyAlphabets(event, this)" id="city" value="" />
                                        <span class="floating-item-label">City</span>
                                </label> 
                                <div class="error-message" id="err_city"><?php echo $error['city'];?></div>                                            
                            </div> -->
                            <div class="form-row">
                                <label class="floating-item" data-error="Please enter your address">
                                    <textarea class="floating-item-input input-item" maxlength="2000" rows="5" name="address" id="address"></textarea> 
                                    <span class="floating-item-label">Address</span>
                                </label> 
                                <div class="error-message" id="err_address"><?php echo $error['address'];?></div>                                            
                            </div>
                            <div class="form-row">
                                <label class="floating-item" data-error="Please enter your message">
                                    <textarea class="floating-item-input input-item" maxlength="2000" rows="5" name="message" id="message"></textarea> 
                                    <span class="floating-item-label">Message</span>
                                </label> 
                                <div class="error-message" id="err_message"><?php echo $error['message'];?></div>                                            
                            </div>
                            
                            <p class="floating-item" data-error="Please choose whether you are a existing customer or not">Are you a existing customer?</p>
                            <div class="checkboxradio form-row">
                                <div class="checkboxradio-row">
                                    <input class="checkboxradio-item checkboxradio-invisible" name="existing_customer" id="chekout1" type="radio" value="yes"/>
                                    <label class="checkboxradio-label radio-label" for="chekout1"><span>Yes</span></label>
                                </div>
                                <div class="checkboxradio-row">
                                    <input class="checkboxradio-item checkboxradio-invisible" name="existing_customer" id="chekout2" type="radio" value="no"/>
                                    <label class="checkboxradio-label radio-label" for="chekout2"><span>No</span></label>
                                </div>
                                <div class="error-message" id="err_existing_customer"><?php echo $error['telephone'];?></div>
                            </div>
                            <button class="button button-primary has-ripple" name="contact_submit" id="contact_submit">Submit</button>
                            <div id ="dispnone" class="dispnone" style="display: none;">
                                <input type="text" name="contactform" id="contactform" value="">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>