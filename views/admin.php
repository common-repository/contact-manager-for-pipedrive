
<form method="post" action="options.php">

    <?php
    settings_fields('contacts-for-pipedrive');
    do_settings_sections('contacts-for-pipedrive');

    submit_button();
    ?>

</form>
