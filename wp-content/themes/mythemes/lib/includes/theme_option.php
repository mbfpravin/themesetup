<?php
add_action('admin_menu', 'theme_menu');

function theme_menu() {
    add_menu_page('Theme Settings', 'Theme Settings', 'administrator', 'options_page', 'theme_options_page');
}
function theme_options_page() {
    if (isset($_REQUEST['submit'])) {
        update_option('facebook', $_REQUEST['facebook']);
        update_option('twitter', $_REQUEST['twitter']);
        update_option('instagram', $_REQUEST['instagram']);
        update_option('linked_in', $_REQUEST['linked_in']);
        update_option('pininterest', $_REQUEST['pininterest']);
        update_option('youtube', $_REQUEST['youtube']);
        update_option('googleplus', $_REQUEST['googleplus']);
        update_option('rssfeed', $_REQUEST['rssfeed']);
        update_option('contact_us_email', $_REQUEST['contact_us_email']);
        update_option('default_image', $_REQUEST['default_image']);
        update_option('banner_image', $_REQUEST['banner_image']);
        update_option('header_page_logo', $_REQUEST['header_page_logo']);
        update_option('subpage_header_logo', $_REQUEST['subpage_header_logo']);
        update_option('googleapp', $_REQUEST['googleapp']);
        update_option('appstore', $_REQUEST['appstore']);
        $updated = 1;
    } ?>
<?php if ($updated == 1) { ?>
        <div class="updated" style="margin-top: 10px;"><p>Details Updated Successfully</p></div>
<?php } ?>
    <div id="usual2" class="usual">
        <form name="options" id="options" action="" method="post">
            <h1>Theme settings</h1>
               <div class="contaniner">
                    <div class="label">Facebook</div>
                    <div class="field"><input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Twitter</div>
                    <div class="field"><input type="text" name="twitter" id="twitter" value="<?php echo get_option('twitter'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Linkedin</div>
                    <div class="field"><input type="text" name="linked_in" id="linked_in" value="<?php echo get_option('linked_in'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Instagram</div>
                    <div class="field"><input type="text" name="instagram" id="instagram" value="<?php echo get_option('instagram'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Pinterest</div>
                    <div class="field"><input type="text" name="pininterest" id="pininterest" value="<?php echo get_option('pininterest'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Youtube</div>
                    <div class="field"><input type="text" name="youtube" id="youtube" value="<?php echo get_option('youtube'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Google+</div>
                    <div class="field"><input type="text" name="googleplus" id="googleplus" value="<?php echo get_option('googleplus'); ?>"  />
                    </div><br />
                </div>
                 <div class="contaniner">
                    <div class="label">Rss</div>
                    <div class="field"><input type="text" name="rssfeed" id="rssfeed" value="<?php echo get_option('rssfeed'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Contact us email</div>
                    <div class="field"><input type="text" name="contact_us_email" id="contact_us_email" value="<?php echo get_option('contact_us_email'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Default Image</div>
                    <div class="field"><input type="text" name="default_image" id="default_image" value="<?php echo get_option('default_image'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Header Page Logo</div>
                    <div class="field"><input type="text" name="header_page_logo" id="header_page_logo" value="<?php echo get_option('header_page_logo'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Subpage Header Logo</div>
                    <div class="field"><input type="text" name="subpage_header_logo" id="subpage_header_logo" value="<?php echo get_option('subpage_header_logo'); ?>"  />
                    </div><br />
                </div>
                 <div class="contaniner">
                    <div class="label">Subscribe description</div>
                    <div class="field">
                        <input type="text" name="subscribe_description" id="subscribe_description" value="<?php echo get_option('subscribe_description'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">Google App</div>
                    <div class="field"><input type="text" name="googleapp" id="googleapp" value="<?php echo get_option('googleapp'); ?>"  />
                    </div><br />
                </div>
                <div class="contaniner">
                    <div class="label">App Store</div>
                    <div class="field"><input type="text" name="appstore" id="appstore" value="<?php echo get_option('appstore'); ?>"  />
                    </div><br />
                </div> 
                <br style="clear:both;" />
            <input type="submit" class="btn" name="submit" value="Save Options" style="margin-top:20px;" />
        </form>
    </div>
<?php } ?>