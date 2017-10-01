<?php

require_once('config.php');

// Set DSN
$dsn = 'mysql:host='.$host.';dbname='.$dbname;

// Creat a PDO instance
$pdo = new PDO($dsn, $user, $passport);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


// PDO QUERY
$stmt = $pdo->query('SELECT * FROM posts');

/*
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $row['title'] . '<br>';
}

while($row = $stmt->fetch()) {
    echo $row->title . '<br>';
}


# PREPARE STATEMENTS (prepare & execute)

// FETCH MULTIPLE POSTS


// Positional Params
$sql = 'SELECT * FROM `posts` WHERE `author` = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$author]);
$posts = $stmt->fetchAll();


// User Input
$author = 'Brad';
$is_published = false;


// Named Params
$sql = 'SELECT * FROM `posts` WHERE `author` = :author && `is_published` = :is_published';
$stmt = $pdo->prepare($sql);
$stmt->execute(['author' => $author, 'is_published' => $is_published]);
$posts = $stmt->fetchAll();

foreach($posts as $post) {
    echo $post->title . '<br>';
}

$id = 1;
// FETCH SINGLE POST
$sql = 'SELECT * FROM `posts` WHERE `id` = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$post = $stmt->fetch();

echo $post->body;

// Get Row Count
$author = 'Brad';
$stmt = $pdo->prepare('SELECT * FROM `posts` WHERE `author` = ?');
$stmt->execute([$author]);
$postCount = $stmt->rowCount();

echo $postCount;

// INSERT DATA
$title = 'Post Five';
$body = 'This is post five';
$author = 'Kevin';

$sql = 'INSERT INTO posts(title, body, author) VALUES(:title, :body, :author)';
$stmt = $pdo->prepare($sql);
$stmt->execute(['title' => $title, 'body' => $body, 'author' => $author]);


// UPDATE DATA
$id = 1;
$body = 'This is the updated post';

$sql = 'UPDATE `posts` SET `body` = :body WHERE `id` = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['body' => $body, 'id' => $id]);


// DELETE DATA
$id = 3;

$sql = 'DELETE FROM `posts` WHERE `id` = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
*/

// SEARCH DATA
$search = "%post one%";
$sql = 'SELECT * FROM `posts` WHERE `title` LIKE ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$search]);
$posts = $stmt->fetchAll();

foreach($posts as $post) {
    echo $post->title . '<br>';
}
