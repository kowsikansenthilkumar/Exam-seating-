 $check = mysqli_query($conn, "SELECT * FROM rooms WHERE ename='$ename' AND date='$date' AND ses='$ses'");
    $count = mysqli_num_rows($check);
	
	
	$check1 = mysqli_query($conn, "SELECT * FROM rooms WHERE ename='$ename' AND date='$date' AND ses='$ses' AND sect='$sec' AND dep='$dept' AND sub='$sub'");
    $count1 = mysqli_num_rows($check1);
	
	

    if ($count == 0) {
        echo "<script>alert('No hall created for this exam')</script>";
    }elseif ($count1 > 0) {
        echo "<script>alert('already this sec added for this exam')</script>";
    }else {
        $sql = "SELECT MAX(id) AS max_id FROM rooms WHERE ename='$ename' AND date='$date' AND ses='$ses' AND regno!='' AND roww='$roww'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $row = mysqli_fetch_array($result);
			
			
			
			
			
            $maxID = $row['max_id'] ;

           



            
			
			
			if($maxID==0){
			
			$qt=mysqli_query($conn,"SELECT id FROM rooms  where roww='$roww' ORDER BY id ASC LIMIT 1");
			
			$rw=mysqli_fetch_array($qt);
			
			
			 $maxID = $rw[0];
			
			
			}else{
			
			            $maxID = $row['max_id']+1;
			}
			
			
           // Displaying the value of $maxID

            $qry3 = mysqli_query($conn, "SELECT * FROM student WHERE dept='$dept' AND year='$year' AND class='$sec'");
            $num = mysqli_num_rows($qry3);
            $num;  // Displaying the value of $num

            while ($row3 = mysqli_fetch_array($qry3)) {
                $regno = $row3['regno'];

                // Assuming you want to update the row with the specific $maxID
                $qry4 = mysqli_query($conn,"UPDATE rooms SET regno='$regno',sect='$sec',dep='$dept',sub='$sub' WHERE id='$maxID' ");
                $maxID++;
            }

           if ($qry4) {
    echo "Update successful";
} else {
    echo "Update failed: " . mysqli_error($conn);
}
        } 
    }