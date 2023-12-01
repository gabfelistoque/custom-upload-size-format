# custom-upload-size-format
Custom size limit and file formats for all users except admin


````
function custom_upload_size_limit($size) {
    $user = wp_get_current_user();

    if (!in_array('administrator', (array) $user->roles)) {
        $max_size = 2 * 1024 * 1024; // bytes (2 MB)
        return $max_size;
    } else {
        return $size;
    }
}

add_filter('upload_size_limit', 'custom_upload_size_limit');

function custom_upload_mimes($mimes) {
    $user = wp_get_current_user();
    if (!in_array('administrator', (array) $user->roles)) {
        $mimes = array(
            'webp' => 'image/webp',
        );
    }

    return $mimes;
}

add_filter('upload_mimes', 'custom_upload_mimes');
````
