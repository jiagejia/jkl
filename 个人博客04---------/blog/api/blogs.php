
<?php
include_once dirname(__FILE__).'/conn.php';

$isCheck = true;
$blogs = [];

$sql = "SELECT * FROM blogs ";
if(isset($_GET['id']) AND is_numeric($_GET['id']) ){
    $id = $_GET['id'];
    $sql = $sql." WHERE id=".$id ;
}else{
    if(isset($_GET['pageStart']) && is_numeric($_GET['pageStart']) && isset($_GET['linenumber']) && is_numeric($_GET['linenumber']) ){
        $pageStart = $_GET['pageStart'];
        $linenumber = $_GET['linenumber'];
        $sql = $sql." LIMIT $pageStart,$linenumber ";
    }
}

//$sql = $sql . 'order by id desc';

if($isCheck){
    $result = mysqli_query($conn,$sql);
    $blogs = mysqli_fetch_all($result,MYSQLI_ASSOC);
}
echo json_encode(array('isCheck'=>$isCheck,'blogs'=>$blogs),JSON_UNESCAPED_UNICODE);

?>