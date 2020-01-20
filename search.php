<?php

    require_once 'connexion.php';
    if (isset($_GET['user'])) {
      if ($_GET['user']==''){
        $user = strtolower((String) trim($_GET['user']));
          $sql = "SELECT * FROM `phenotypes` LIMIT 10";;
        $row = $con->query($sql) ;
        $list=$row->fetchall(PDO::FETCH_OBJ);
        
      }
      else{
        $user = strtolower((String) trim($_GET['user']));
      $sql = "SELECT * FROM `phenotypes` WHERE `PharmGKB_Accession_Id`LIKE '$user%' LIMIT 10";
    $row = $con->query($sql) ;
    $list=$row->fetchall(PDO::FETCH_OBJ);
  

      }
    
 if($list != null){
  $en = $list[0];
do{
      
    
?>
      <table class="tab">
                      <tr>
                    <th>PhramGKB</th>
              <th>Name</th>
              <th>Alternate Names</th>
              <th>References</th>
              <th>Vocabulary</th>
              <th>plus d'info</th>

                      </tr>
                      <tr>
                        <td><?php echo verif($en->PharmGKB_Accession_Id) ; ?></td>
                        <td><?php echo verif($en->Name) ; ?></td>
                    <td ><div class="container">
                          
                          <p class="image"><?php echo verif($en->Alternate_Names); ?></p>
                        
                         <div class="overlay"> 
                        <div class="text"><?php echo verif2( $en->Alternate_Names); ?></div>
                        </div>
                </div>
                         </td>
                        <td><?php echo verif($en->Cross_references); ?></td>
                        <td><div class="container">
                          <p class="image">
                          <?php echo verif($en->External_Vocabulary); ?></p>
                          <div class="overlay">
                    <div class="text"><?php echo verif2($en->External_Vocabulary); ?></div>
                  </div>
                  </div>
                          
                    </td>

                        <td><a href="plusinfo.php"><img src="images/icon2"></a></td>
                      </tr>
                    </table>
<?php
     
    }  while ($en = next($list));
    }else{
      ?>
      <div class="erreur">
      <h3> pas de phenotypes </h3>
      </div>
      <?php
    } 
  }
  function verif($vari){
    if ($vari == null) {
     return '------------';
    }
    else 
      return  substr($vari,0,30) ;
  }
    function verif2($vari){
    if ($vari == null) {
     return '------------';
    }
  }

?>