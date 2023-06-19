<?php
$fields = ['Name', 'Username', 'Email', 'Street', 'Suite', 'City', 'Zipcode', 'lat', 'lng', 'phone', 'Webside', 'com_name', 'catchPhrase', 'bs'];

$data = [];

// Iterate over the fields and retrieve the corresponding values from the POST request
foreach ($fields as $field) {
    $data[$field] = isset($_POST[$field]) ? htmlspecialchars($_POST[$field], ENT_QUOTES | ENT_HTML5, 'UTF-8') : '';
}


// Extract the values from the $data array
$name = $data['Name'];
$username = $data['Username'];
$email = $data['Email'];
$street = $data['Street'];
$suite = $data['Suite'];
$city = $data['City'];
$zipcode = $data['Zipcode'];
$lat = $data['lat'];
$lng = $data['lng'];
$phone = $data['phone'];
$website = $data['Webside'];
$com_name = $data['com_name'];
$catchPhrase = $data['catchPhrase'];
$bs = $data['bs'];

// Read the existing JSON data from the file
$jsonData = file_get_contents('../dataset/users.json');
$data = json_decode($jsonData, true);

// Get the last user ID and increment it for the new user
$lastUser = end($data);
$newUserId = $lastUser['id'] + 1;

// Create the new user array
$newUser = [
    'id' => $newUserId,
    'name' => $name,
    'username' => $username,
    'email' => $email,
    'address' => [
        'street' => $street,
        'suite' => $suite,
        'city' => $city,
        'zipcode' => $zipcode,
        'geo' => [
            'lat' => $lat,
            'lng' => $lng,
        ],
    ],
    'phone' => $phone,
    'website' => $website,
    'company' => [
        'name' => $com_name,
        'catchPhrase' => $catchPhrase,
        'bs' => $bs,
    ],
];

// Add the new user to the data array
$data[] = $newUser;

// Convert the updated data back to JSON
$updatedData = json_encode($data, JSON_PRETTY_PRINT);

// Write the updated JSON data back to the file
file_put_contents('../dataset/users.json', $updatedData);

// Redirect to the index page
header("Location: ../index.php");
exit();
?>
