<?php

include_once('db.php');

$keyword = $_GET['keyword'];

$sql = "SELECT * FROM accessories WHERE title LIKE '%$keyword%'
		UNION SELECT * FROM clothes WHERE title LIKE '%$keyword%'
		UNION SELECT * FROM mobiles WHERE title LIKE '%$keyword%' ORDER BY title ";

$query = mysqli_query($con,$sql);

if (!$query) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

if(mysqli_num_rows($query) > 0) {

    while($data = mysqli_fetch_array($query)) {   
        
        echo "<a href='http://localhost/Ecommerce%20website%20--%20doSoDeal/product/".$data['id']."/".$data['category']."'>".$data['title']."</a><br>";
    }

}

else {
	echo "<div class='text-danger'>No results matched !</div>";
}

?>