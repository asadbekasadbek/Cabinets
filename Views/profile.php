<?php
require_once 'layouts/head.php';
if(!$_SESSION['user']){
    header('Location: /');
}
?>
<div   class="body grid global "  >
    <div  style="display: flex;justify-content: end ; width: 1080px; height: 20px;"  >
         <a style="margin: 1em " href="/logout">logout</a>
    </div>
</div>

<?php
require_once 'layouts/footer.php';

?>
