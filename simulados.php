 <?php
 include_once 'menu.php';
include_once 'assets/php/classes/classSimulados.php';
include_once 'assets/php/classes/classArea.php';

        $classSimulados= new classSimulados();
        $classArea= new classArea();




    if(isset($_POST['delete'])){

         $classSimulados->setId($_POST['id1']);

        if($classSimulados->delete() == 1){
            $result = "Venda excluida com sucesso!";
        }else{
            $error = "Erro ao excluir";
        }

    }

        if(isset($_POST['edit'])){
        $classSimulados->setId($_POST['id1']);
        $classSimulados->setQuantidade($_POST['quantidade']);
        $classSimulados->setData($_POST['data']);
        $classSimulados->setProdutos_id($_POST['produtos_id']);

    if($classSimulados->edit() == 1){
        $result = "Estoque editado com sucesso!";
    }else{
        $error = "Erro ao editar";
    }

}

 ?>


 <div id="main" class="container-fluid" style="margin-top: 50px">
 
    <div id="top" class="row">
        <div class="col-sm-3">
            <h2>Simulados</h2>
        </div>
        <div class="col-sm-6">
            
           <!--  <div class="input-group h2">
                <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar Itens">
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div> -->
            <div class="input-group">
                    <div class="input-group-btn">
                                </div>
                                <input type="text" id="input1-group2" name="input1-group2" placeholder="Pesquisar" class="form-control">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                  </button>
                              </div>
        </div>
        <div class="col-sm-3">
            <a href="adicionarVenda.php" class="btn btn-primary pull-right h2">Novo Item</a>
        </div>
    </div> <!-- /#top -->
 
 
    <hr />
    <div id="list" class="row">
    
    <div class="table-responsive col-md-12">
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Data</th>
                    <th>Área</th>
                    
                    
                    <th class="actions">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $classSimulados->index();
                $stmt1 = $classArea->index();
                $row1= $stmt1->fetch(PDO::FETCH_OBJ);
                 while($row = $stmt->fetch(PDO::FETCH_OBJ) ){
                  ?>
                <tr>
                    <td><?php echo $row->name ?></td>
                    <td><?php echo $row->data ?></td>
                    <td><?php echo $row1->nome ?></td>
                    <td class="actions">
                       <a class="btn btn-warning btn-xs" href="editarVendas.php?id=<?php echo $row->idmocks ?>">Editar</a>
                       
                    </td>
                       <?php } ?>
                </tr>
                
            </tbody>
        </table>
    </div>
    
    </div> <!-- /#list -->
 </div> <!-- /#main -->

<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modalLabel">Excluir Item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Sim</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div>

<script type="application/javascript">
                var active = document.getElementById("simulado");
                active.classList.add("active");
 </script>

<?php 
require_once 'footer.php';
?>