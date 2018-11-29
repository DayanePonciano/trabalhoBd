 <?php
 include_once 'menu.php';
include_once 'assets/php/classes/classArea.php';
    
        $classArea= new classArea();

    if(isset($_POST['delete'])){

         $classArea->setId($_POST['id1']);

        if($classArea->delete() == 1){
            $result = "Venda excluida com sucesso!";
        }else{
            $error = "Erro ao excluir";
        }

    }

        if(isset($_POST['edit'])){
        $classArea->setId($_POST['id1']);
        $classArea->setNome($_POST['nome']);
      
    if($classArea->edit() == 1){
        $result = "Área editada com sucesso!";
    }else{
        $error = "Erro ao editar";
    }

}

 ?>


 <div id="main" class="container-fluid" style="margin-top: 50px">
 
    <div id="top" class="row">
        <div class="col-sm-3">
            <h2>Áreas</h2>
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
            <a href="adicionarArea.php" class="btn btn-primary pull-right h2">Nova Area</a>
        </div>
    </div> <!-- /#top -->
 
 
    <hr />
    <div id="list" class="row">
    
    <div class="table-responsive col-md-12">
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome da Área</th>                    
                    
                    <th class="actions">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $classArea->index();
                 while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                  ?>
                <tr>
                    <td><?php echo $row->idarea ?></td>
                    <td><?php echo $row->nome ?></td>
                                        
                    <td class="actions">
                        <a class="btn btn-warning btn-xs" href="editararea.php?id=<?php echo $row->idarea ?>">Editar</a>
                        <a class="btn btn-danger btn-xs"  href="excluirarea.php?id=<?php echo $row->idarea ?>" >Excluir</a>
                    </td>
                       <?php } ?>
                </tr>
                
            </tbody>
        </table>
    </div>
    
    </div> <!-- /#list -->
 </div> <!-- /#main -->
<script type="application/javascript">
                var active = document.getElementById("areas");
                active.classList.add("active");
 </script>

<?php 
require_once 'footer.php';
?>