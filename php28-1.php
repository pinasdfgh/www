<?php
$data=file('data.csv');
?>

<table border="1">
    <tr>
        <th>name</th>
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>4</th>
    </tr>
        <?php
        foreach ($data as $value){
            $files=explode(',',$value);
            echo '<tr>';
            foreach($files as $file){
                echo "<td>{$file}</td>";
            }
            echo '</tr>';
        }

        ?>
</table>
