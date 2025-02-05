<?php

function searchUsersByName($database, $name)
{
     // Query the database for user data
     $query = "SELECT * FROM users WHERE name LIKE '%$name%' ORDER BY id DESC";
     $query = preg_replace(array('/\s*,\s*/', '/\s*=\s*/'), array(',', '='), $query);
     $result = $database->query($query);

     // Check for query errors
     if (!$result) {
          die('Query Error (' . $database->errno . ') ' . $database->error);
     }

     // Loop through the results and store them in an array
     $users = [];
     while ($row = $result->fetch_assoc()) {
          $users[] = $row;
     }

     return $users;
}
