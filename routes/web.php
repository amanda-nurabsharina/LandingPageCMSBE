<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/link-storage', function () {
    $target = storage_path('app/public');
    // On shared hosting, $_SERVER['DOCUMENT_ROOT'] points to the active document root (e.g. public_html/api)
    $shortcut = $_SERVER['DOCUMENT_ROOT'] . '/storage';
    
    if (file_exists($shortcut)) {
        if (is_link($shortcut)) {
            unlink($shortcut);
        } else {
            return "File atau folder sudah ada di: {$shortcut}. Silakan hapus secara manual terlebih dahulu.";
        }
    }
    
    if (symlink($target, $shortcut)) {
        return "Storage link berhasil dibuat!<br>Target: {$target}<br>Link: {$shortcut}";
    }
    
    return "Gagal membuat storage link.";
});
