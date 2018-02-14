<?php
$conn = mysqli_connect("localhost", "root", "root", "Articles");
if(!$conn){
    echo "Connexion à la base impossible";
}
$sql = "SELECT * FROM ARTICLE ORDER BY dateArticle DESC";
$result = mysqli_query($conn, $sql);
while ($row = $result->fetch_assoc()) {
    $Array[] = $row;
}
echo json_encode($Array);
?>