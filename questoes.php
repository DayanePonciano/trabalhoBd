 <?php
 include_once 'menu.php';
include_once 'assets/php/classes/classQuestoes.php';
include_once 'assets/php/classes/classSimulados.php';
        
        $classSimulados= new classSimulados();
        $classQuestoes= new classQuestoes();

    if(isset($_POST['delete'])){

         $classQuestoes->setId($_POST['id1']);

        if($classQuestoes->delete() == 1){
            $result = "Venda excluida com sucesso!";
        }else{
            $error = "Erro ao excluir";
        }

    }

        if(isset($_POST['edit'])){
        $classQuestoes->setId($_POST['id1']);
        $classQuestoes->setNome($_POST['nome']);
      
    if($classQuestoes->edit() == 1){
        $result = "Área editada com sucesso!";
    }else{
        $error = "Erro ao editar";
    }

}

 ?>


 <div id="main" class="container-fluid" style="margin-top: 50px">
 
    <div id="top" class="row">
        <div class="col-sm-3">
            <h2>Questões</h2>
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
            <a href="adicionarquestoes.php" class="btn btn-primary pull-right h2">Nova Questão</a>
        </div>
    </div> <!-- /#top -->
 
 
    <hr />
    <div id="list" class="row">
    
    <div class="table-responsive col-md-12">
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Questão</th>
                    <th>Resposta</th>
                    <th>Simulado</th>                    
                    
                    <th class="actions">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt1 = $classSimulados->index();
                $stmt = $classQuestoes->index();
                
                 while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                    $row1= $stmt1->fetch(PDO::FETCH_OBJ);
                  ?>
                <tr>
                    <td><?php echo $row->question ?></td>
                    <td>Alternativa<?php echo $row->answer ?></td>
                    <td><?php echo $row1->name; ?></td>                    
                    <td class="actions">
                        <a class="btn btn-warning btn-xs" href=">">Editar</a>
                        <a class="btn btn-danger btn-xs"  href="" >Excluir</a>
                    </td>
                       <?php } ?>
                </tr>
                
            </tbody>
        </table>
    </div>
    
    </div> <!-- /#list -->
 </div> <!-- /#main -->
<script type="application/javascript">
                var active = document.getElementById("questoes");
                active.classList.add("active");
 </script>

<?php 
require_once 'footer.php';
?>