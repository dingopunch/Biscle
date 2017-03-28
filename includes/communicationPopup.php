<?php
	$userId = $_SESSION['userid'];
	$sql= "SELECT announcementId from userannouncement WHERE userId=$userId AND status=1";
	$initQuery = mysqli_query($con, $sql);
?>

<?php 
	$ids = array();
	while($ann=mysqli_fetch_array($initQuery)){ 
		$annId = $ann['announcementId'];
		$sql= "SELECT id, title, announcement from announcement WHERE id = $annId AND status=1";
		$query = mysqli_query($con, $sql);
		while($row=mysqli_fetch_array($query)){
			array_push($ids, $row['id']);
?>
<!-- Modal -->
<div id="communicationModal<?php echo $row["id"];?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $row['title']; ?></h4>
      </div>
      <div class="modal-body">
			<?php
				$announcement = $row['announcement'];
                echo "<p>$announcement</p>"; 
			?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="readAnnouncement('<?php echo $row["id"];?>')">I have read the Announcements</button>
      </div>
    </div>

  </div>
</div>
<?php 
		}
	}	
	$ids = array_reverse($ids);
?>
<?php
	foreach ($ids as $id) {
		echo "<script>$('#communicationModal" . $id . "').modal('show');</script>";
	}
?>
<script src="assets/js/communicationPopup.js"></script>