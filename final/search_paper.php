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
      if (isset($_POST['query'])) {
           $search_paper=$_POST['query'];
      $results = $db->query("SELECT *FROM main_table INNER JOIN authors_table ON main_table.pubmed_id=authors_table.pubmed_id WHERE main_table.pubmed_id LIKE '%".$search_paper."%'");
      while ($row = $results->fetchArray()) {
           $outputs .='<tr>
      <th scope="row">'.$row['pubmed_id'].'</th>
      <td>'.$row['title'].'</td>
      <td>'.$row['fore_name'].'</td>
      <td>'.$row['journal_title'].'</td>
      <td>'.$row['country_journal'].'</td>
      <td><a href="next_page.php?id='.$row['id'].'">'.substr($row['abstract'], 0,50).'</a></td>
      <td>'.$row['pub_year'].'</td>
    </tr>';
      }
      if ($results->fetchArray()==''){
      	  $outputs.='<div class="alert alert-warning">
  <strong>Data Not Found</strong></div>';
      }
      echo $outputs;
      }
      else{
      	$results = $db->query("SELECT *FROM main_table INNER JOIN authors_table ON main_table.pubmed_id=authors_table.pubmed_id");
      	  while ($row = $results->fetchArray()) {
           $outputs .='<tr>
      <th scope="row">'.$row['pubmed_id'].'</th>
      <td>'.$row['title'].'</td>
      <td>'.$row['fore_name'].'</td>
      <td>'.$row['journal_title'].'</td>
      <td>'.$row['country_journal'].'</td>
      <td><a href="next_page.php?id='.$row['id'].'">'.substr($row['abstract'], 0,50).'</a></td>
      <td>'.$row['pub_year'].'</td>
    </tr>';
      }
       echo $outputs;
      }
?>