<?php
	include_once 'menu.php';
    include_once 'assets/php/classes/classSimulados.php';
     include_once 'assets/php/classes/classArea.php';
     $classSimulados = new classSimulados();
     $classArea= new classArea();




        if(isset($_POST['insert'])){
            
        $classSimulados->setNome($_POST['nome']);
         $classSimulados->setArea($_POST['area']);
         $classSimulados->setData($_POST['data']);
         



    if($classSimulados->insert()==1){
         echo "<script>location.href='simulados.php';
         alert('Simulado Adicionado');
         </script>"; 
    }else{

        $error="Erro ao inserir";
    }

    }


?>

<div id="main" class="container-fluid" style="margin-top: 50px">
 
    <div id="top" class="row">
        <div class="col-sm-12">
            <h2>Adicionar Simulado</h2>
        </div>
       
    </div> <!-- /#top -->
 
 
    <hr />
                        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body card-block">
                                <form action="adicionarSimulado.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Área</label></div>
                                        <div class="col col-md-6">
                                        <select  class="form-control" name="area">     
                                                <option>Selecione a área</option>
                                                <?php 
                                                $stmt = $classArea->index();
                                                while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                                                ?>
                                                <option value="<?php echo $row->idarea; ?>"> <?php echo $row->nome ?></option>
                                                <?php  } ?>
                                                </select>
                                        </div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nome</label></div>
                                        <div class="col-12 col-md-6"><input type="text" id="email-input" name="nome"  class="form-control"></div>
                                    </div>
                                 <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Data</label></div>
                                        <div class="col-12 col-md-6"><input type="date" id="email-input" name="data"  class="form-control"></div>
                                    </div>
                                    
                                        <div class="form-actions form-group">
                                        	<button type="submit" name="insert" class="btn btn-success btn-sm">Adicionar</button>
                                            <a class="btn btn-success btn-sm" href="simulados.php">Voltar</a>
                                        </div>

                                    
                                </form>
                            </div>
                           
                        </div>
                       
                    </div>

<?php
	include_once 'footer.php';
?>