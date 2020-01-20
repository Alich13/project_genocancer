

<!DOCTYPE html>
<html lang="en">

<head>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<link rel="stylesheet" type="text/css" href="style.css">
			<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
			<style>
.container {
  position: relative;
}

.overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;

  background-color: rgb(3, 47, 96 ) ;
  background-color: rgba(3, 47, 96, 0.9); 
  overflow: hidden;
  width: 100%;
  height: 100%;
  -webkit-transform: scale(0);
  -ms-transform: scale(0);
  transform: scale(0);
  -webkit-transition: .3s ease;
  transition: .3s ease;
}

.container:hover .overlay {
  -webkit-transform: scale(1);
  -ms-transform: scale(1);
  transform: scale(1);
  height: 150px;
  width: 400px;
  overflow: auto;
  border: 1px solid #ccc;
}

.text {
  color: white;
  font-size: 16px;
  position: absolute;
  top: 50%;
  left: 50%;


  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: justify;
}
</style>
		
</head>
<body>
	<div class="txtproject">
			<h1>PROJECT</h1>
	</div>
	<div  id="input">
      <div class="form-group">
			      <label style="color: white ;"><h2>Search the Phenotype</h2></label>
			      <input type="text" class="form-control" id="Phenotype" aria-describedby="Phenotype" placeholder="Phenotype" name="Phenotype">
			  
       </div>
	</div>
	<div id="res">
		<?php
		require_once 'connexion.php';
		 $sql2 = "SELECT * FROM `phenotypes` LIMIT 10";
                   $row = $con->query($sql2) ;
                   $list=$row->fetchall(PDO::FETCH_OBJ);
                   $en = $list[0];
                   do {
                   	?>
                   	<table class="tab">
                   		<tr>
				            <th>PhramGKB</th>
							<th>Name</th>
							<th>Alternate Names</th>
							<th>References</th>
							<th>Vocabulary</th>
							<th><small> plus d'info </small></th>

                   		</tr>
                   		<tr>
                   		

                   		      <td><?php echo verif($en->PharmGKB_Accession_Id) ; ?></td>
                        <td><?php echo verif($en->Name) ; ?></td>
                    <td ><div class="container">
                          <p class="image"><?php echo verif($en->Alternate_Names); ?></p>
                  <div class="overlay">
                    <div class="text"><?php echo  verif2($en->Alternate_Names); ?></div>
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
                   }while ($en = next($list)) ;
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
					    }else
					    return $vari ;
					  }

                   	?>

	</div>

	
</body>
              <script>
   $(document).ready(function() {
    $('#Phenotype').keyup(function(){
      $('#res').html("");

      var nom = $(this).val();
      
      if(true)
      {
        $.ajax({
          type:'GET',
          url:'search.php',
          data:'user='+ nom,
          success:function(data){
            if(data != "")
            {
             $('#res').append(data);
            } 
            else
            {
              document.getElementById('res').innerHTML = "<p> pas de Phenotype</p>";
            }
          }
         

        });
      
      }
    });
    // body...
  });
   
</script>

</html>
  								