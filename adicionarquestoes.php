<?php
	include_once 'menu.php';
    include_once 'assets/php/classes/classQuestoes.php';
     include_once 'assets/php/classes/classSimulados.php';
     $classQuestoes = new classQuestoes();
     $classSimulados= new classSimulados();




        if(isset($_POST['insert'])){
            
        $classQuestoes->setQuestao($_POST['questao']);
         $classQuestoes->setResposta($_POST['resposta']);
         $classQuestoes->setOpcao1($_POST['option1']);
         $classQuestoes->setOpcao2($_POST['option2']);
         $classQuestoes->setOpcao3($_POST['option3']);
         $classQuestoes->setOpcao4($_POST['option4']);
         $classQuestoes->setSimulado($_POST['idsimulado']);




    if($classQuestoes->insert()==1){
         echo "<script>location.href='adicionarquestoes.php';
            alert('Questão Adicionada');
         </script>"; 
    }else{

        $error="Erro ao inserir";
    }

    }


?>

<div id="main" class="container-fluid" style="margin-top: 50px">
 
    <div id="top" class="row">
        <div class="col-sm-12">
            <h2>Adicionar Questões</h2>
        </div>
       
    </div> <!-- /#top -->
 
 
    <hr />
                        <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body card-block">
                                <form action="adicionarquestoes.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Selecione o Simulado</label></div>
                                        <div class="col col-md-6">
                                        <select  class="form-control" name="idsimulado">     
                                                <option>Selecione o simulado</option>
                                                <?php 
                                                $stmt = $classSimulados->index();
                                                while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                                                ?>
                                                <option value="<?php echo $row->idmocks; ?>"> <?php echo $row->name ?></option>
                                                <?php  } ?>
                                                </select>
                                        </div>
                                </div>
                                <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Questão</label></div>
                                        <div class="col-12 col-md-6"><textarea type="textarea-input" name="questao"  class="form-control"></textarea></div>
                                    </div>
                                   
                                    <div class="row">
                                        <br>
                                    <div class="col col-md-12"><h1 align="center">Adicione as Alternativas</h1>
                                        <br>
                                    <p align="center">Adicione as alternativas e selecione a correta</p>
                                    </div>

                                </div>
                                <br>
                                    <br>
                                 <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Alternativa 1</label></div>
                                        <div class="col-12 col-md-6"><input type="radio" name="resposta" value="1"> Resposta<input type="text" id="email-input" name="option1"  class="form-control">  </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Alternativa 2</label></div>
                                        <div class="col-12 col-md-6"><input type="radio" name="resposta" value="2">Resposta<input type="text" id="email-input" name="option2"  class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Alternativa 3</label></div>
                                        <div class="col-12 col-md-6"><input type="radio" name="resposta" value="3">Resposta<input type="text" id="email-input" name="option3"  class="form-control"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Alternativa 4</label></div>
                                        <div class="col-12 col-md-6"><input type="radio" name="resposta" value="4">Resposta<input type="text" id="email-input" name="option4"  class="form-control"></div>
                                    </div>
                                    
                                </div>
                                <br>
                                    <br>
                                 
                                        <div class="form-actions form-group">
                                        	<button type="submit" name="insert" class="btn btn-success btn-sm">Adicionar</button>
                                            <a class="btn btn-success btn-sm" href="questoes.php">Voltar</a>

                                        </div>
                                </form>
                            </div>
                           
                        </div>
                       
                    </div>

<?php
	include_once 'footer.php';
?>