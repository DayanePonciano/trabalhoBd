<?php
	include_once 'menu.php';
    include_once 'assets/php/classes/classArea.php';
     $classArea = new classArea();
    $classArea->setId($_GET['id']);
    $area = $classArea->view();



        ?>

<div id="main" class="container-fluid" style="margin-top: 50px">
 
    <div id="top" class="row">
        <div class="col-sm-12">
            <h2>Editar area</h2>
        </div>
       
    </div> <!-- /#top -->
 
 
    <hr />
                        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body card-block">
                                <form action="area.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">ID Área</label></div>
                                        <div class="col-12 col-md-9"><input type="text" name="id" value="<?php echo $area->idarea ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Nome</label></div>
                                        <div class="col-12 col-md-9"><input name="nome" id="textarea-input" rows="9" value="<?php echo $area->nome ?>" class="form-control"></input></div>
                                    </div>
                            
                                        <div class="form-actions form-group">
                                         <input type="hidden" name="id1" value="<?php echo $area->idarea ?>" >
                                        	<button type="submit" name="edit" class="btn btn-success btn-sm">Salvar</button>
                                        </div>
                                </form>
                            </div>
                           
                        </div>
                       
                    </div>

<?php
	include_once 'footer.php';
?>