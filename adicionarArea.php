
<?php
	include_once 'menu.php';
    include_once 'assets/php/classes/classArea.php';

     $classArea = new classArea();



        if(isset($_POST['insert'])){
            
        $classArea->setNome($_POST['nome']);        
        $classArea->setId($_POST['idarea']);        

         



    if($classArea->insert()==1){
         echo "<script>location.href='area.php';</script>"; 
    }else{

        $error="Erro ao inserir";
    }

    }


?>

<div id="main" class="container-fluid" style="margin-top: 50px">
 
    <div id="top" class="row">
        <div class="col-sm-12">
            <h2>Adicionar Área</h2>
        </div>
       
    </div> <!-- /#top -->
 
 
    <hr />
                        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body card-block">
                                <form action="adicionarArea.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="nome" placeholder="" class="form-control">
                                    </div>
                                </div>
                               
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Código da Área</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email-input" name="idarea" placeholder="" class="form-control"></div>
                                    </div>
                                    
                                        <div class="form-actions form-group">
                                        	<button type="submit" name="insert" class="btn btn-success btn-sm">Enviar</button>
                                        </div>
                                </form>
                            </div>
                           
                        </div>
                       
                    </div>

<?php
	include_once 'footer.php';
?>

