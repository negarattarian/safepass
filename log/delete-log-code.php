<?php
include_once '../app/backend.php';

echo $_GET['id'];

if (isset($_GET['delete']) && isset($_GET['user_id']) && isset($_GET['id'])) {
    delete_log($_GET['user_id'], $_GET['id']);
    header("Location: ../index.php?m=log&p=delete-log");
    exit();
}