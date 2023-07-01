<?php

$db = new PDO('sqlite:..\db\users.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $db->prepare('INSERT INTO users (fullname, username, email, password, avatar)
                            VALUES (?,?,?,?,?)');






