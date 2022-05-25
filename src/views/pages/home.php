<?php $render('header', ['titulo' => 'geral']); ?>

<pre>
<?php
//print_r($viewData);

?>
</pre>

<div class="content">
    <div class="geral">
        <div class="form-container">
            <form method="get">
                <div class="form">

                    <input type="date" name="dataInicial" title="Período Inicial">

                    <input type="date" name="dataFinal" title="Período Final">

                    <input type="submit" value="Gerar">
                </div>
            </form>
        </div>
        <hr>
        <div class="result">
            <div class="result-content">
                <div class="result-title">Total de Resoluções</div>
                <div class="result-value resolucao">10</div>
            </div>
            <div class="result-content">
                <div class="result-title">Resoluções Corretas</div>
                <div class="result-value corretas">10</div>
            </div>
            <div class="result-content">
                <div class="result-title">Resoluções Erradas</div>
                <div class="result-value erradas">10</div>
            </div>
            <div class="result-content">
                <div class="result-title">Taxa de erros</div>
                <div class="result-value taxa-erro">10%</div>
            </div>
            <div class="result-content">
                <div class="result-title">Taxa de acerto</div>
                <div class="result-value taxa-acerto">10%</div>
            </div>
        </div>
        <br>
        <div>
            <?php if (!empty($materia)) : ?>
                <h2 style="text-align: center;">Desempenho por matéria</h2>
                <table class="table-desempenho">
                    <?php foreach ($materia as $key => $value) :?>
                        <tr>
                        <th><a href="<?= $base; ?>/materia/5"><?=$key?></a></th>
                        <th class="resolucao">Resoluções</th>
                        <th class="corretas">Corretas</th>
                        <th class="erradas">Erradas</th>
                        <th class="taxa-erro">Taxas de erros</th>
                        <th class="taxa-acerto">Taxa de acertos</th>
                    </tr>

                    <tr>
                        <td></td>
                        <td class="resolucao">10</td>
                        <td class="corretas">10</td>
                        <td class="erradas">5</td>
                        <td class="taxa-erro">5%</td>
                        <td class="taxa-acerto">10%</td>
                    </tr>

                    <?php endforeach ?>
                    
                </table>
            <?php endif ?>
        </div>
    </div>
    <div class="add-info">
        <h3 style="text-align: center;">Adicionar Matéria</h3>
        <form method="post">
            <div style="text-align: center;">

                <label for="materia">Matéria</label>
                <input type="text" name="materia">

                <input type="submit" value="Adicionar">
            </div>
        </form>
    </div>
</div>

</body>

</html>