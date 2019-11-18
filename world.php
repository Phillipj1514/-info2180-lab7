<?php
$host = getenv('IP');
//$host = 'localhost';
$username = 'lab7_user';
$password = 'password';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$country =$_REQUEST["country"];
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$country_list = "<table>
                <tr>
                  <th>Country Name</th>
                  <th>Continent</th>
                  <th>Independence Year</th>
                  <th>Head of State</th>
                </tr>
                </table>";
foreach ($results as $row){
  $country_list = $country_list.'
  <tr>
    <td>'.$row['name'].'</td>
    <td>'.$row['continent'].'</td>
    <td>'.$row['independence_year'].'</td>
    <td>'.$row['head_of_state'].'</td>
  </tr>';
}
$country_list = $country_list.'</table>';

echo $country_list

?>
