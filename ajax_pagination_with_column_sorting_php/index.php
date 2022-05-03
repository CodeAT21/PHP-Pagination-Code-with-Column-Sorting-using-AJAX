<?php
include_once 'Pagination.php';
require_once 'dbConfig.php';
$limit = 7;
$query   = $db->query("SELECT COUNT(*) as rowNum FROM register");
$result  = $query->fetch_assoc();
$rowCount= $result['rowNum'];

$pagConfig = array(
    'totalRows' => $rowCount,
    'perPage' => $limit,
    'contentDiv' => 'dataContainer',
    'link_func' => 'columnSorting'
);
$pagination =  new Pagination($pagConfig);
$query = $db->query("SELECT * FROM register ORDER BY id DESC LIMIT $limit");
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Ajax Pagination with Column Sorting using PHP by codeat21</title>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
// Custom function to handle sort by column operation
function columnSorting(page_num){
	page_num = page_num?page_num:0;
	
	let coltype='',colorder='',classAdd='',classRemove='';
	$( "th.sorting" ).each(function() {
		if($(this).attr('colorder') != ''){
			coltype = $(this).attr('coltype');
			colorder = $(this).attr('colorder');
			
			if(colorder == 'asc'){
				classAdd = 'asc';
				classRemove = 'desc';
			}else{
				classAdd = 'desc';
				classRemove = 'asc';
			}
		}
	});
    
    $.ajax({
        type: 'POST',
        url: 'getData.php',
        data:'page='+page_num+'&coltype='+coltype+'&colorder='+colorder,
        beforeSend: function () {
            $('.loading-overlay').show();
        },
        success: function (html) {
            $('#dataContainer').html(html);
            if(coltype != '' && colorder != ''){
				$( "th.sorting" ).each(function() {
					if($(this).attr('coltype') == coltype){
						$(this).attr("colorder", colorder);
						$(this).removeClass(classRemove);
						$(this).addClass(classAdd);
					}
				});
			}
            $('.loading-overlay').fadeOut("slow");
        }
    });
}

$(function(){
	$(document).on("click", "th.sorting", function(){
		let current_colorder = $(this).attr('colorder');
		$('th.sorting').attr('colorder', '');
		$('th.sorting').removeClass('asc');
		$('th.sorting').removeClass('desc');
		if(current_colorder == 'asc'){
			$(this).attr("colorder", "desc");
			$(this).removeClass("asc");
			$(this).addClass("desc");
		}else{
			$(this).attr("colorder", "asc");
			$(this).removeClass("desc");
			$(this).addClass("asc");
		}
		columnSorting();
	});
});
</script>
</head>
<body>
<div class="container">
    <h1>PHP Pagination Code with Column Sorting using AJAX</h1>
	<div class="datalist-wrapper">
		<!-- Loading overlay -->
		<div class="loading-overlay"><div class="overlay-content">Loading...</div></div>
		
		<!-- Data list container -->
		<div id="dataContainer">
			<table class="table table-striped sortable">
            <thead>
                <tr>
                    <th scope="col" class="sorting" coltype="id" colorder="">#ID</th>
                    <th scope="col" class="sorting" coltype="name" colorder=""> Name</th>
                    <th scope="col" class="sorting" coltype="email" colorder="">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                ?>
                    <tr>
                        <th scope="row"><?php echo $row["id"]; ?></th>
                        <td><?php echo $row["name"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                    </tr>
                <?php
                    }
                }else{
                    echo '<tr><td colspan="6">No records found...</td></tr>';
                }
                ?>
            </tbody>
            </table>
            <!-- Display pagination links -->
            <?php echo $pagination->createLinks(); ?>
		</div>
	</div>
</div>
</body>
</html>