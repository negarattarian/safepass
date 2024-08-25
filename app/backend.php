<?php
include_once 'db.php';

function user_login($fields)
{
    $db = connection();

    // Prepare and execute a safe query to prevent SQL Injection
    $stmt = $db->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->bindParam(':username', $fields['username']);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password (if passwords are hashed, use password_verify)
    if ($res && $res['password'] === $fields['password']) {
        $_SESSION['username'] = $res['name'];
        $_SESSION['userid'] = $res['id'];

        // Add log
        $user_id = $res['id'];
        $current_datetime = date('Y-m-d H:i:s');
        $log_stmt = $db->prepare("INSERT INTO logs (action, user_id, datetime) VALUES ('1', :user_id, :datetime)");
        $log_stmt->bindParam(':user_id', $user_id);
        $log_stmt->bindParam(':datetime', $current_datetime);
        $log_stmt->execute();

        header("location:index.php");
    } else {
        header("location:login.php?login=error");
    }
}

function user_register($fields)
{
    $db = connection();

    // Prepare and execute a safe query to prevent SQL Injection
    $stmt = $db->prepare("SELECT * FROM user WHERE username = :username");
    $stmt->bindParam(':username', $fields['username']);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if username already exists
    if ($res) {
        header("location:register.php?register=error");
    } else {
        // Insert the new user data safely
        $register_stmt = $db->prepare("INSERT INTO user (username, password, name) VALUES (:username, :password, :name)");
        $register_stmt->bindParam(':username', $fields['username']);
        $register_stmt->bindParam(':password', $fields['password']);
        $register_stmt->bindParam(':name', $fields['name']);
        $register_stmt->execute();

        header("location:login.php");
    }
}
function add_password($fields)
{
    $db = connection();
    $user_id = $_SESSION['userid'];

    // Insert the password into the database
    $res = $db->query("INSERT INTO passwords (user_id, username, password, website, notes, group_id) VALUES ('$user_id', '$fields[username]', '$fields[password]', '$fields[website]', '$fields[notes]', '$fields[group]')");

    // Check if the password was added successfully
    if ($res) {
        // Log the action
        $current_datetime = date('Y-m-d H:i:s'); // Get current date and time
        $db->query("INSERT INTO logs (action, user_id, datetime) VALUES ('2', '$user_id', '$current_datetime')");
    }

    return $res;
}

function show_passwords()
{
    $db = connection();
    $user_id = $_SESSION['userid'];

//    echo $user_id;

    $result = $db->query("
        SELECT p.*, g.name as group_name 
        FROM passwords p 
        LEFT JOIN group_tbl g ON p.group_id = g.id where p.user_id = $user_id
    ");
    return $result->fetchAll(PDO::FETCH_ASSOC);
}


function show_password_by_id($id)
{
    $db = connection();
    $result = $db->query("SELECT * FROM passwords WHERE id = '$id'");
    return $result->fetchAll(PDO::FETCH_ASSOC);
}


function edit_password($fields, $id)
{
    $db = connection();
    $username = $fields['username'];
    $password = $fields['password'];
    $website = $fields['website'];
    $notes = $fields['notes'];

    $db->query("UPDATE passwords SET username = '$username', password = '$password', website = '$website', notes = '$notes' WHERE id = '$id'");
}


function delete_password($id)
{
    $db = connection();
    $res = $db->query("DELETE FROM passwords WHERE id = '$id'");
    return $res;
}

function add_password_group($fields)
{
    $db = connection();
    $user_id = $_SESSION['userid'];
    $created_date = date('Y-m-d H:i:s');

    // Insert the new group into the database
    $res = $db->query("INSERT INTO group_tbl (name, created_date, note, status, user_id) VALUES ('$fields[name]', '$created_date', '$fields[note]', '$fields[status]', '$user_id')");

    // Check if the group was added successfully
    if ($res) {
        // Log the action
        $current_datetime = date('Y-m-d H:i:s'); // Get current date and time
        $db->query("INSERT INTO logs (action, user_id, datetime) VALUES ('3', '$user_id', '$current_datetime')");
    }

    return $res;
}

function show_password_groups()
{
    $db = connection();
    $user_id = $_SESSION['userid'];

    $result = $db->query("SELECT * FROM group_tbl where user_id = '$user_id'");
    return $result->fetchAll(PDO::FETCH_ASSOC);
}


function get_passwords_by_group($groupId)
{
    $db = connection();
    $user_id = $_SESSION['userid'];
    $sql = $db->query("SELECT * FROM passwords WHERE group_id = '$groupId' and user_id = '$user_id'");
    return $sql->fetchAll(PDO::FETCH_ASSOC);
}


function show_group_by_id($id)
{
    $db = connection();
    $sql = $db->query("SELECT * FROM group_tbl WHERE id = '$id'");
    return $sql->fetch(PDO::FETCH_ASSOC);
}


function edit_group($fields, $id)
{
    $db = connection();

    $sql = "UPDATE group_tbl SET name = '$fields[name]', note = '$fields[description]', status = '$fields[status]' WHERE id = '$id'";
    $result = $db->exec($sql);

    return $result !== false;
}


function delete_group($groupId)
{
    $db = connection();
    $sql = "DELETE FROM group_tbl WHERE id = '$groupId'";
    $db->exec($sql);
}


function show_group()
{
    $db = connection();
    $user_id = $_SESSION['userid'];

    $result = $db->query("SELECT * FROM group_tbl where user_id = '$user_id'");
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function backupDatabase()
{
    $db = connection();
    $user_id = $_SESSION['userid'];
    $created_date = date('Y-m-d H:i:s');

    // Define the table and backup file
    $table = 'passwords';
    $backupFile = 'backup_' . date('Y-m-d_H-i-s') . '.sql';

    // Open backup file
    $handle = fopen($backupFile, 'w');

    // Check if file opened successfully
    if ($handle === false) {
        throw new Exception("Could not open the backup file for writing.");
    }

    // Get table data
    $result = $db->query("SELECT * FROM $table WHERE user_id = '$user_id'");
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $columns = implode(", ", array_keys($row));
        $values = implode(", ", array_map([$db, 'quote'], $row));
        fwrite($handle, "INSERT INTO $table ($columns) VALUES ($values);\n");
    }

    fclose($handle);

    // Log the backup action
    $current_datetime = date('Y-m-d H:i:s');
    $db->query("INSERT INTO logs (action, user_id, datetime) VALUES ('5', '$user_id', '$current_datetime')");

    return $backupFile;
}


function restoreDatabase($backupFile)
{
    $db = connection();
    $user_id = $_SESSION['userid'];
    $current_datetime = date('Y-m-d H:i:s');

    // Read the SQL commands from the backup file
    $sqlCommands = file_get_contents($backupFile);

    // Separate the SQL commands (assuming they are separated by semicolons)
    $commands = explode(';', $sqlCommands);

    try {
        // Execute each command
        foreach ($commands as $command) {
            if (trim($command) != '') {
                $db->exec($command);
            }
        }

        // Log the restore action
        $db->query("INSERT INTO logs (action, user_id, datetime) VALUES ('6', '$user_id', '$current_datetime')");

        return true; // Success
    } catch (PDOException $e) {
        // Optionally log the error or handle it differently
        return $e->getMessage(); // Return error message
    }
}

function countUserGroups()
{
    $db = connection();
    $user_id = $_SESSION['userid'];
    $result = $db->query("SELECT COUNT(*) as group_count FROM group_tbl WHERE user_id = '$user_id'");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row['group_count'];
}

function countPasswords()
{
    $db = connection();
    $user_id = $_SESSION['userid'];
    $result = $db->query("SELECT COUNT(*) as pass_count FROM passwords WHERE user_id = '$user_id'");
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row['pass_count'];
}

function show_logs()
{
    $user_id = $_SESSION['userid'];

    $db = connection();
    $result = $db->query("SELECT * FROM logs where user_id = '$user_id'");
    return $result->fetchAll(PDO::FETCH_ASSOC);
}

function delete_log($user_id, $id)
{
    $db = connection();
    $sql = "DELETE FROM logs WHERE user_id = '$user_id' AND id = '$id'";
    $res = $db->exec($sql);
    return $res;
}

function count_logs()
{
    $user_id = $_SESSION['userid'];
    $db = connection();
    $stmt = $db->query("SELECT COUNT(*) AS log_count FROM logs where user_id = '$user_id'");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['log_count'];
}