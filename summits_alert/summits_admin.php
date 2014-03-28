<?php
    if(isset($_POST['summits_admin_hidden']) && $_POST['summits_admin_hidden'] == 'Y') {
        //Form data sent

        $alert_message = $_POST['summits_alert_message'];
        update_option('summits_alert_message', $alert_message);

        $alert_theme = $_POST['summits_alert_theme'];
        update_option('summits_alert_theme', $alert_theme);

        $alert_css = $_POST['summits_alert_use_css'];
        update_option('summits_alert_css', $alert_css);

        $alert_centered = $_POST['summits_alert_center_message'];
        update_option('summits_alert_center_message', $alert_centered);

        ?>
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
        <?php
    } else {
        //Normal page display
        $alert_message = get_option('summits_alert_message');
        $alert_theme = get_option('summits_alert_theme');
        $alert_css = get_option('summits_alert_css');
        $alert_centered = get_option('summits_alert_center_message');
    }
?>

<div class="wrap">
    <?php echo "<h2>" . __( 'Summits Sitewide Alert Message', 'summits_admin_trdom' ) . "</h2>"; ?>
    
    <style>
    .summits-input-field {
        width: 80%;
        display: block;
        margin-bottom: 10px;
    }
    .summits-input-field-textarea {
        height: 200px;
    }
    </style>

    <form name="summits_admin_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="summits_admin_hidden" value="Y">
        
        <ul>
            <li>
              <label for="summits_alert_message"><?php _e("Alert Text" ); ?></label><br>
              <textarea class="summits-input-field summits-input-field-textarea" name="summits_alert_message"><?php echo stripslashes($alert_message); ?></textarea>  
            </li>
            <li>
                <label for="summits_alert_center_message">Center The Alert Message</label>
                <input class="summits-input-field" type="checkbox" name="summits_alert_center_message" <?php echo ($alert_centered) ? 'checked': '' ;?> /><br>
            </li>
            <li>
                <label for="summits_alert_use_css">Use Default CSS</label>
                <input class="summits-input-field" type="checkbox" name="summits_alert_use_css" <?php echo ($alert_css) ? 'checked': '' ;?> /><br>
            </li>
            <li>
                <label for="summits-alert-theme"><?php _e("Alert Class" ); ?></label><br>
                <select name="summits_alert_theme">
                    <option <?php echo ($alert_theme == 'success') ? 'selected': '' ;?> value="success">Success</option>
                    <option <?php echo ($alert_theme == 'info') ? 'selected': '' ;?> value="info">Info</option>
                    <option <?php echo ($alert_theme == 'warning') ? 'selected': '' ;?> value="warning">Warning</option>
                    <option <?php echo ($alert_theme == 'danger') ? 'selected': '' ;?> value="danger">Danger</option>
                </select>  
            </li>
        </ul>

        <p class="submit">
            <input class="button-primary" type="submit" name="Submit" value="<?php _e('Update Options', 'summits_admin_trdom' ) ?>" />
        </p>
    </form>
</div>