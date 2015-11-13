
<?php
    if(isset($_POST['luupdf'])){
        echo '<div class="inpdf">'.$_POST['luupdf'].'</div>';
        
   ?>
<script>
    setTimeout(function (){window.print()},3000);
</script>
<?php 
 }
?>
<style>
    footer{
        visibility: hidden;
    }
</style>
