<?php

$errors = [];
$data = [];

if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required.';
}

if (empty($_POST['surname'])) {
    $errors['surname'] = 'Surname is required.';
}

if (empty($_POST['gender'])) {
    $errors['gender'] = 'Gender is required.';
}

if (empty($_POST['date'])) {
    $errors['date'] = 'Date of birth is required.';
}

if (empty($_POST['address'])) {
    $errors['address'] = 'Address is required.';
}

if (empty($_POST['city'])) {
    $errors['city'] = 'City is required.';
}

if (!empty($errors)) {
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success!';
}

echo json_encode($data);