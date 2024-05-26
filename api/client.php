<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Initialize API
include_once('../core/initialize.php');

// Instantiate post
$post = new Post($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Determine the HTTP method
$method = $_SERVER['REQUEST_METHOD'];

// Handle POST and DELETE requests
switch ($method) {
    case 'POST':
        $post->title = $data->title;
        $post->body = $data->body;
        $post->author = $data->author;
        $post->category_id = $data->category_id;

        $message = $post->create() ? 'Post created.' : 'Post not created.';
        break;
    case 'DELETE':
        $post->id = $data->id;

        $message = $post->delete() ? 'Post deleted.' : 'Post not deleted.';
        break;
    default:
        $message = 'Invalid request method.';
}

echo json_encode(['message' => $message]);

