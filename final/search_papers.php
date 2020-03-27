<?php
      class MyDB extends SQLite3{
    function __construct(){
      $this->open('lung1.db');
    }
   }
   $db= new MyDB();
    if (!$db) {
      echo $db->lastErrorMsg();
    }
    $outputs='';
    if (isset($_POST['year'])) {
    	$year=$_POST['year'];
    	$country=$_POST['country'];
    	$results = $db->query("SELECT *FROM main_table WHERE year='$year' OR country_journal='$country'");
      while ($row = $results->fetchArray()) {
           $outputs .='<tr>
      <th scope="row">'.$row['pubmed_id'].'</th>
      <td>'.$row['title'].'</td>
      <td>'.$row['journal_title'].'</td>
      <td>'.$row['country_journal'].'</td>
      <td><a href="#">'.substr($row['abstract'], 0,50).'</a></td>
      <td>'.$row['pub_year'].'</td>
    </tr>';
      }
      if ($results->fetchArray()==''){
      	  $outputs.='<div class="alert alert-warning">
  <strong>Data Not Found</strong></div>';
      }
      echo $outputs;
    }

?>