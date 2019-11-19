<?php
$host = getenv('IP');
//$host = 'localhost';
$username = 'lab7_user';
$password = 'password';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


$country = $_REQUEST['country'];
if(count($_REQUEST) == 2){
  $stmt = $conn->query("SELECT cities.name, cities.district, cities.population FROM countries INNER JOIN cities ON cities.country_code=countries.code WHERE countries.name LIKE '%$country%';"); 
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $country_list = "<table>
                <tr>
                  <th>City Name</th>
                  <th>District</th>
                  <th>Population</th>
                </tr>
                ";
  foreach ($results as $row){
    $country_list = $country_list.'
    <tr>
      <td>'.$row['name'].'</td>
      <td>'.$row['district'].'</td>
      <td>'.$row['population'].'</td>
    </tr>';
  }
  //print_r($results);

}else{
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  foreach ($results as $row){
    $country_list = $country_list.'
    <tr>
      <td>'.$row['name'].'</td>
      <td>'.$row['continent'].'</td>
      <td>'.$row['independence_year'].'</td>
      <td>'.$row['head_of_state'].'</td>
    </tr>';
  }
}

$country_list = $country_list.'</table>';
echo $country_list

?>
