<?php

function studentAll()
{
  $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

  $sql = "SELECT * FROM students";
  $stmt = $db->prepare($sql);

  $stmt->execute();

  return $stmt->fetchAll();
}

function studentInsert()
{

  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
  $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
  $religion = filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_STRING);
  $school = filter_input(INPUT_POST, 'school', FILTER_SANITIZE_STRING);
  $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);

  if ($name && $address && $gender && $religion && $school && $department) {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

    $sql = "INSERT INTO students (name, address, gender, religion, school, department) 
            VALUES (:name, :address, :gender, :religion, :school, :department)";
    $stmt = $db->prepare($sql);

    $params = array(
      ":name" => $name,
      ":address" => $address,
      ":gender" => $gender,
      ":religion" => $religion,
      ":school" => $school,
      ":department" => $department,
    );

    $saved = $stmt->execute($params);

    if ($saved) {
      header("Location: /");
    };
  }
}

function studentDelete()
{
  $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

  $id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);

  $sql = "DELETE FROM students WHERE student_id=:student_id";
  $stmt = $db->prepare($sql);

  $params = array(
    ":student_id" => $id,
  );

  $deleted = $stmt->execute($params);

  if ($deleted) {
    header("Location: /");
  };
}

function studentUpdate()
{
  $id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
  $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
  $religion = filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_STRING);
  $school = filter_input(INPUT_POST, 'school', FILTER_SANITIZE_STRING);
  $department = filter_input(INPUT_POST, 'department', FILTER_SANITIZE_STRING);

  if ($name && $address && $gender && $religion && $school && $department) {
    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

    $sql = "UPDATE students
          SET name=:name,
          address=:address,
          gender=:gender,
          religion=:religion,
          school=:school,
          department=:department
          WHERE student_id=:student_id";
    $stmt = $db->prepare($sql);

    $params = array(
      ":student_id" => $id,
      ":name" => $name,
      ":address" => $address,
      ":gender" => $gender,
      ":religion" => $religion,
      ":school" => $school,
      ":department" => $department,
    );

    $stmt->execute($params);

    if ($stmt->rowCount() > 0) {
      header("Location: /");
    };
  }
}
