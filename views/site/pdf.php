<?php
    if(isset($_POST['luupdf'])){
        echo $_POST['luupdf'];
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