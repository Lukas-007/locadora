<div class="home-bg"></div>


<h2 class="mt-5 mb-5">Orçamento </h2>


<div class="container">
    <div class="row capa">
        <table class="table">
            
            <tbody>
                <tr>
                    <th scope="row">Origem</th>
                    <td><?php echo $origem ?></td>
                </tr>
                <tr>
                    <th scope="row">Destino</th>
                    <td><?php echo $destino ?></td>
                </tr>
                <tr>
                    <th scope="row">Tipo de Carro</th>
                    <td><?php echo $tipoCarro ?></td>
                </tr>
                <tr>
                    <th scope="row">Distância</th>
                    <td><?php echo $km ?> Km</td>
                </tr>
                <tr>
                    <th scope="row">Valor por km</th>
                    <td>R$ <?php echo $valorKm ?></td>
                </tr>
                <tr>
                    <th scope="row">Valor Total do aluguel</th>
                    <td>R$ <?php echo $valorAluguel ?></td>
                </tr>
            </tbody>
        </table>
        <a type="button" href="<?php echo BASE_URL?>" class="btn btn-secondary">Voltar</a>
    </div>
</div>




