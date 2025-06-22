<?php
// Optional: validate with a secret if set in GitHub
$secret = 'grav_blog';
$headers = getallheaders();
$payload = file_get_contents('php://input');

if (isset($headers['X-Hub-Signature-256'])) {
    $signature = 'sha256=' . hash_hmac('sha256', $payload, $secret);
    if (!hash_equals($signature, $headers['X-Hub-Signature-256'])) {
        http_response_code(403);
        exit('Invalid signature');
    }
}

// Trigger deploy script
shell_exec('/home1/smtgflte/www/website_ae6496d0/deploy.sh > /dev/null 2>/dev/null &');

echo "OK";
?>
