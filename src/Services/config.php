<?php
return array(
    // if value is true, use production api
    'production' => env('GMO_API_PRODUCTION', false),

    // if use 3D secure
    'secure_redirect_html' => env('GMO_SECURE_RIDIRECT_HTML', '/your/path/to/RidirectPage'),
    'secure_tran_url' => env('GMO_SECURE_TRAN_URL', 'http://localhost/clientSample'),
);
