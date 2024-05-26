<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

// Initializing our API
include_once('../core/initialize.php');

// Instantiate post
$post = new Post($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

// Determine the HTTP method
$method = $_SERVER['REQUEST_METHOD'];

//API response se recebe o metodo post ou delete
if ($method == 'POST') {
    // Create post
    $post->title = $data->title;
    $post->body = $data->body;
    $post->author = $data->author;
    $post->category_id = $data->category_id;

    if ($post->create()) {
        echo json_encode(
            array('message' => 'Post created.')
        );
    } else {
        echo json_encode(
            array('message' => 'Post not created.')
        );
    }
} elseif ($method == 'DELETE') {
    // Delete post
    $post->id = $data->id;

    if ($post->delete()) {
        echo json_encode(
            array('message' => 'Post deleted.')
        );
    } else {
        echo json_encode(
            array('message' => 'Post not deleted.')
        );
    }
} else {
    echo json_encode(
        array('message' => 'Invalid request method.')
    );
}
