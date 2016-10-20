<pre>
<?php 
var_dump($data);
?>
</pre>
<h1> <?php echo $data[0]['Header']['title'] ?> </h1>
<?php 
foreach($data[0]['SmallHeader'] as $value) :
?>
<h2><?php echo $value['title'];?><h2>
<?php 
endforeach;
?>