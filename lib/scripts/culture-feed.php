<?php
/**
 * Performs an Instagram API request to fetch the latest media posts from the roboboogie account and
 * output a sanitized images array for consumption by JavaScript.
 */

function fetchLatestImages($url)
{
    $ch = curl_init();
    curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => 2
    ));

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$CLIENT_ID = "1df21a2b2c8e4a2eab7c442156399012";
$CLIENT_SECRET = '59347c78c9b6497c8dd9b815e8c32bdd';
$USER_ID = "581798276";
$AUTHORIZATION_REDIRECT_URI = 'http://teamroboboogie.com';
$MAX_IMAGES = 12;
$i = 0;

// $url = sprintf('https://api.instagram.com/v1/users/%s/media/recent/?client_id=%s&count=%d', $USER_ID, $CLIENT_ID, $MAX_IMAGES);

//Instagram needs an access_token now. Need to create an oauth for this, but this is the workaround for now
$url = sprintf("https://www.instagram.com/roboboogiepdx/media/");

$results = json_decode(fetchLatestImages($url), true);

$html = '<div>';
foreach ($results['items'] as $item) {
    if ($i < $MAX_IMAGES) {
        $imageLink = $item['images']['thumbnail']['url'];
        $caption = $item['caption']['text'];
        $link = $item['link'];
        //thumbnails are square, but too small. Make them bigger
        $imageLink = str_replace('150x150', '320x320', $imageLink);
        $html .= sprintf('<div class="width-1-4"><a href="%s"><img src="%s" title="%s" /></a></div>', $link, $imageLink, $caption);
        $i++;
    } else {
        break;
    }
}
$html .= '</div>';

echo $html;