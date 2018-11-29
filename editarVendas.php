<?php
	include_once 'menu.php';
    include_once 'assets/php/classes/classSimulado.php';
        include_once 'assets/php/classes/classArea.php';

    $classSimulado= new classSimulado();
     $simulado = new classSimulado();

         $classSimulado->setId($_GET['id']);
    $simulado = $classSimulado->view();

        ?>

<div id="main" class="container-fluid" style="margin-top: 50px">
 
    <div id="top" class="row">
        <div class="col-sm-12">
            <h2>Editar Venda</h2>
        </div>
       
    </div> <!-- /#top -->
 
 
    <hr />
                        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body card-block">
                                <form action="simulado.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Simulado</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="quantidade" value="<?php echo $simulado->nome ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Data</label></div>
                                        <div class="col-12 col-md-9"><input type="date" id="email-input" name="data"  class="form-control" value="<?php echo $simulado->data ?>"></input></div>
                                        
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">ID do Produto</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email-input" name="produtos_id" value="<?php echo $simulado->produtos_id ?>" class="form-control"></div>
                                    </div>
                                    
                                        <div class="form-actions form-group">
                                         <input type="hidden" name="id1" value="" >
                                        	<button type="submit" name="edit" class="btn btn-success btn-sm">Salvar</button>
                                        </div>
                                </form>
                            </div>
                           
                        </div>
                       
                    </div>

<?php
	include_once 'footer.php';
?>