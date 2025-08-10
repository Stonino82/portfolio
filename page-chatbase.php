<?php
/**
 * Template Name: Chatbase Proxy Page
 *
 * This template embeds the Chatbase help center using a full-screen iframe,
 * which is the most reliable method for complex external applications.
 */

// 1. Your Chatbase Agent ID.
define('CHATBASE_AGENT_ID', 'Lo_HmYardnS7l3DeoMMLW');

// 2. The direct URL for the Chatbase help center.
$chatbase_url = 'https://chatbase.co/' . CHATBASE_AGENT_ID . '/help';

?>
<!DOCTYPE html>
<html style="margin: 0 !important; padding: 0 !important;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nino AI</title> <?php // You can change this title if you want ?>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            overflow: hidden; /* Prevents scrollbars on the parent page */
        }
        iframe {
            border: none;
            width: 100%;
            height: 100%;
            display: block;
        }
    </style>
</head>
<body>
    <iframe src="<?php echo esc_url($chatbase_url); ?>"></iframe>
</body>
</html>
<?php

// We stop here to prevent WordPress from loading its own header, footer, etc.
exit;