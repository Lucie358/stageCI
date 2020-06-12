<p>list of Compagnies</p>
<?php 
var_dump($companies)
?>
<ul>
<?php
        foreach($companies as $entreprises)
        {
?>
    
        <li><?php echo $entreprises['name']?></li>
<?php
        }
?>
 </ul>