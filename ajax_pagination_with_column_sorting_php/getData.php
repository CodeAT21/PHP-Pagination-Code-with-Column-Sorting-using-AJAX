<?php
if(isset($_POST['page'])){
    include_once 'Pagination.php';
    require_once 'dbConfig.php';
	$offset = !empty($_POST['page'])?$_POST['page']:0;
	$limit = 7;
    $sortSQL = '';
    if(!empty($_POST['coltype']) && !empty($_POST['colorder'])){
        $coltype = $_POST['coltype'];
        $colorder = $_POST['colorder'];
        $sortSQL = " ORDER BY $coltype $colorder";
    }
    $query   = $db->query("SELECT COUNT(*) as rowNum FROM register");
    $result  = $query->fetch_assoc();
    $rowCount= $result['rowNum'];
    $pagConfig = array(
        'totalRows' => $rowCount,
        'perPage' => $limit,
		'currentPage' => $offset,
		'contentDiv' => 'dataContainer',
		'link_func' => 'columnSorting'
    );
    $pagination =  new Pagination($pagConfig);
    $query = $db->query("SELECT * FROM register $sortSQL LIMIT $offset,$limit");
?>
    <!-- Data list container -->
    <table class="table table-striped sortable">
    <thead>
        <tr>
            <th scope="col" class="sorting" coltype="id" colorder="">#ID</th>
            <th scope="col" class="sorting" coltype="name" colorder="">Name</th>
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
<?php
}
?>