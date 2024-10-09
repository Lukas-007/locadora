<div class="home-bg"></div>


<h2 class="mt-5 mb-5">Home </h2>

<form action="<?php echo BASE_URL?>home/orcamento" method="post">
    <div class="container">
        <div class="row capa">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="origem">Origem</label>
                    <select class="form-control" id="origem" name="origem">
                        <?php foreach ($cidades as $cidade) :?>
                            <option value="<?php echo $cidade->getDescricao()?>"><?php echo $cidade->getNome() ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>  

            <div class="col-md-6">
                <div class="form-group">
                    <label for="destino">Destino</label>
                    <select class="form-control" id="destino" name="destino">
                        <?php foreach ($cidades as $cidade) :?>
                            <option value="<?php echo $cidade->getDescricao()?>"><?php echo $cidade->getNome() ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tipo">Tipo de Carro</label>
                    <select class="form-control" id="tipo" name="tipo">
                        <?php foreach ($tipoCarro as $valor =>$item) :?>
                            <option value="<?php echo $valor?>"><?php echo $item ?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <button type="submit" class="btn btn-success solicitar-orcamento">Solicitar Orçamento</button>
            </div>
        </div>
    </div>
</form>



