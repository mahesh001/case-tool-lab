<?php
$a=Array('hello','world','ravi');
$i=0;
echo '<input type="button" name="hello" value="submit">';
echo '<select>';
while($i<3)
{
echo '<option value=';echo $i+1;echo '>';echo $a[$i];
$i++;
}
echo '</select>';

?>

