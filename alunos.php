 <?php
 include_once 'menu.php';
include_once 'assets/php/classes/classLogin.php';

        $classLogin= new classLogin();





 ?>


 <div id="main" class="container-fluid" style="margin-top: 50px">
 
    <div id="top" class="row">
        <div class="col-sm-3">
            <h2>Alunos Cadastrados</h2>
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

    </div> <!-- /#top -->
 
 
    <hr />
    <div id="list" class="row">
    
    <div class="table-responsive col-md-12" align="center">
        <table class="table table-striped" cellspacing="0" cellpadding="0" >
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                $stmt = $classLogin->alunos();
                
                 while($row = $stmt->fetch(PDO::FETCH_OBJ) ){
                  ?>
                <tr>
                    <td><?php echo $row->nome ?></td>
                    <td><?php echo $row->email ?></td>
                  
                       <?php } ?>
                </tr>
                
            </tbody>
        </table>
    </div>
    
    </div> <!-- /#list -->
 </div> <!-- /#main -->


<script type="application/javascript">
                var active = document.getElementById("alunos");
                active.classList.add("active");
 </script>

<?php 
require_once 'footer.php';
?>