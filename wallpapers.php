<?php
header('Content-Type: application/json');

// Folder containing wallpapers
$folder = "images/";

if (!is_dir($folder)) {
    echo json_encode(['error' => 'Image folder not found.']);
    exit;
}

$files = scandir($folder);
$wallpapers = [];

// Optional search filter
$query = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : '';

foreach ($files as $file) {
    if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
        $name = pathinfo($file, PATHINFO_FILENAME);
        if ($query === '' || strpos(strtolower($name), $query) !== false) {
            $wallpapers[] = [
                'name' => $name,
                'url' => $folder . $file
            ];
        }
    }
}

echo json_encode(['wallpapers' => $wallpapers]);
?>
