function custom_upload_settings($value, $type) {
    $user = wp_get_current_user();

    if (!in_array('administrator', (array) $user->roles)) {
        if ($type === 'size') {
            return 2 * 1024 * 1024; // bytes (2 MB)
        } elseif ($type === 'mimes') {        
            return array('webp' => 'image/webp'); 
        }
    }

    return $value;
}

add_filter('upload_size_limit', function ($size) {
    return custom_upload_settings($size, 'size');
});

add_filter('upload_mimes', function ($mimes) {
    return custom_upload_settings($mimes, 'mimes');
});
