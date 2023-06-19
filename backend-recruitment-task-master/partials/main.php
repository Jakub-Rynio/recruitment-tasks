<?php
// Read JSON data from file
$jsonData = file_get_contents('dataset/users.json');
$data = json_decode($jsonData, true);

// Check if deleteUser parameter is set in POST request
if (isset($_POST['deleteUser'])) {
    $userId = $_POST['deleteUser'];

    // Filter data array to remove user with matching id
    $data = array_filter($data, function ($user) use (&$userId) {
        return $user['id'] != $userId;
    });

    // Update JSON data and overwrite the file
    $updatedData = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('dataset/users.json', $updatedData);
}

// Build the table HTML
$table = '<table>';
$table .= '<thead><tr>';
$table .= '<th>Name</th><th>Username</th><th>Email</th><th>Address</th><th>Phone</th><th>Company</th>';
$table .= '</tr></thead><tbody>';

$i = 0;
foreach ($data as $user) {
    // Alternate row colors
    $tr_color = $i % 2 == 0 ? 'bg-light' : 'bg-dark';

    $i++;

    $table .= '<tr class="' . $tr_color . '" id="' . $i . '">';
    $table .= '<td>' . $user['name'] . '</td>';
    $table .= '<td>' . $user['username'] . '</td>';
    $table .= '<td>' . $user['email'] . '</td>';
    $table .= '<td>' . $user['address']['street'] . ', ' . $user['address']['zipcode'] . '</br>' .
        $user['address']['city'];
    $table .= '<td>' . $user['phone'] . '</td>';
    $table .= '<td>' . $user['company']['name'] . '</td>';
    $table .= '
        <td>
            <form method="POST" action="">
                <input type="hidden" name="deleteUser" value="' . $user['id'] . '">
                <button type="submit" class="delete-btn">Delete</button>
            </form>
        </td>';

    $table .= '</tr>';
}

$table .= '</tbody></table>';

// Output the table
echo $table;
?>

