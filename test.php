<?php

$hash = '$2y$10$V0qEpxmxZNycwrs7QuZXvuDoWsh5OPj/7Xf0gOpp/7EhMH6r8Ll/a';

$password = "123456";

if (password_verify($password, $hash)) {
    echo "Password is CORRECT!";
} else {
    echo "Password is WRONG!";
}