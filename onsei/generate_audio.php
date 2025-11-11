<?php
// generate_audio.php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['text'])) {
    $text = escapeshellarg($_POST['text']);
    $lang = escapeshellarg('ja'); // 言語も指定

    // Pythonスクリプトのパスを指定
    $python_script = realpath('generate_audio.py');
    $output_file = 'output.mp3';

    // Pythonスクリプトを外部コマンドとして実行
    // 環境によっては 'python3' や絶対パスが必要かもしれません
    $command = "python3 $python_script $text $lang 2>&1";
    $output = shell_exec($command);

    if (file_exists($output_file)) {
        echo json_encode(['status' => 'success', 'file' => $output_file]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to generate audio file.', 'details' => $output]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>