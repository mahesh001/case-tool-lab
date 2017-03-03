<?php
$mysqli = new mysqli("localhost", "root", "", "student");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$query  = "SELECT CURRENT_USER();";
$query .= "SELECT * FROM student";

/* execute multi query */
if ($mysqli->multi_query($query)) {
    do {
        /* store first result set */
        if ($result = $mysqli->store_result()) {
			while ($row = $result->fetch_row()) {
			
				 $field_cnt = $result->field_count;
				 $i=0;
				while ($i<$field_cnt)
				{
					printf("%s\n", $row[$i]);
					$i++;
				}
            }
            $result->free();
        }
        /* print divider */
        if ($mysqli->more_results()) {
            printf("-----------------\n");
        }
		else
			exit();
    } while ($mysqli->next_result());
}

/* close connection */
$mysqli->close();
?>