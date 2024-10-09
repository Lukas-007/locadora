<?php if (isset($_SESSION['msg_texto']) && !empty($_SESSION['msg_texto'])) {?>
<div class="container">
    <div class="alert alert-<?php echo !isset($_SESSION['msg_tipo'])?'secondary ':$_SESSION['msg_tipo']?> alert-dismissible fade show mt-3" role="alert">
        <strong><?php echo @$_SESSION['msg_titulo']?> </strong> 
        <?php echo $_SESSION['msg_texto']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php }

$_SESSION["msg_titulo"]="";
$_SESSION["msg_texto"]="";
$_SESSION["msg_tipo"]="";


?>