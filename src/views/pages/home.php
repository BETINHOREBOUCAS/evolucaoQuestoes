<?php $render('header', ['titulo' => 'Geral']); ?>

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

                    <input type="date" name="dataInicial" title="Período Inicial" autocomplete="off">

                    <input type="date" name="dataFinal" title="Período Final" autocomplete="off">

                    <input type="submit" value="Gerar">
                </div>
            </form>
            <h3>Mês Atual</h3>
        </div>
        <hr>
        <div class="result">
            <?php if (!empty($materias)) : ?>
                <div class="result-content">
                    <div class="result-title">Total de Resoluções</div>
                    <div class="result-value resolucao"><?= $valores_totais['total_resolucao']; ?></div>
                </div>
                <div class="result-content">
                    <div class="result-title">Resoluções Corretas</div>
                    <div class="result-value corretas"><?= $valores_totais['total_corretas']; ?></div>
                </div>
                <div class="result-content">
                    <div class="result-title">Resoluções Erradas</div>
                    <div class="result-value erradas"><?= $valores_totais['total_erradas']; ?></div>
                </div>
                <div class="result-content">
                    <div class="result-title">Taxa de erros</div>
                    <div class="result-value taxa-erro"><?= $valores_totais['total_resolucao'] > 0 ? number_format(($valores_totais['total_erradas'] / $valores_totais['total_resolucao']) * 100, 2, ",", ".") . "%" : "0%" ?></div>
                </div>
                <div class="result-content">
                    <div class="result-title">Taxa de acerto</div>
                    <div class="result-value taxa-acerto"><?= $valores_totais['total_resolucao'] > 0 ? number_format(($valores_totais['total_corretas'] / $valores_totais['total_resolucao']) * 100, 2, ",", ".") . "%" : "0%" ?></div>
                </div>
            <?php endif ?>
        </div>

        <br>
        <div>
            <?php if (!empty($materias)) : ?>

                <h2 style="text-align: center;">Desempenho por matéria</h2>
                <table class="table-desempenho">
                    <?php foreach ($materias as $key => $value) : ?>

                        <tr>
                            <th><a href="<?= $base . "/materia/" . $value['id_materia']; ?>"><?= ucwords($key) ?></a></th>
                            <th class="resolucao">Resoluções</th>
                            <th class="corretas">Corretas</th>
                            <th class="erradas">Erradas</th>
                            <th class="taxa-erro">Taxas de erros</th>
                            <th class="taxa-acerto">Taxa de acertos</th>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="resolucao"><?= $value['resolucao'] ?></td>
                            <td class="corretas"><?= $value['corretas'] ?></td>
                            <td class="erradas"><?= $value['erradas'] ?></td>
                            <td class="taxa-erro"><?= $value['resolucao'] > 0 ? number_format(($value['erradas'] / $value['resolucao']) * 100, 2, ",", ".") . "%" : "0%" ?></td>
                            <td class="taxa-acerto"><?= $value['resolucao'] > 0 ? number_format(($value['corretas'] / $value['resolucao']) * 100, 2, ",", ".") . "%" : "0%" ?></td>
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
                <input type="text" name="materia" required autocomplete="off">

                <label for="conteudo">Conteúdo</label>
                <input type="text" name="conteudo" required autocomplete="off">

                <input type="submit" value="Adicionar">
            </div>
        </form>
    </div>

</div>


<div class="info-secundaria-geral">
    <div class="geral">
        <div class="form-container">
            <h3>Mês Anterior</h3>
        </div>
        <hr>
        <div class="result">
            <?php if (!empty($materias)) : ?>

                <div class="result-content">
                    <div class="result-title">Total de Resoluções</div>
                    <div class="result-value resolucao"><?= $valores_totais['total_resolucao']; ?></div>
                </div>
                <div class="result-content">
                    <div class="result-title">Resoluções Corretas</div>
                    <div class="result-value corretas"><?= $valores_totais['total_corretas']; ?></div>
                </div>
                <div class="result-content">
                    <div class="result-title">Resoluções Erradas</div>
                    <div class="result-value erradas"><?= $valores_totais['total_erradas']; ?></div>
                </div>
                <div class="result-content">
                    <div class="result-title">Taxa de erros</div>
                    <div class="result-value taxa-erro"><?= $valores_totais['total_resolucao'] > 0 ? number_format(($valores_totais['total_erradas'] / $valores_totais['total_resolucao']) * 100, 2, ",", ".") . "%" : "0%" ?></div>
                </div>
                <div class="result-content">
                    <div class="result-title">Taxa de acerto</div>
                    <div class="result-value taxa-acerto"><?= $valores_totais['total_resolucao'] > 0 ? number_format(($valores_totais['total_corretas'] / $valores_totais['total_resolucao']) * 100, 2, ",", ".") . "%" : "0%" ?></div>
                </div>
            <?php endif ?>
        </div>

        <br>

        <div>
            <?php if (!empty($materias)) : ?>

                <h2 style="text-align: center;">Desempenho por matéria</h2>
                <table class="table-desempenho">
                    <?php foreach ($materias as $key => $value) : ?>

                        <tr>
                            <th><a href="<?= $base . "/materia/" . $value['id_materia']; ?>"><?= ucwords($key) ?></a></th>
                            <th class="resolucao">Resoluções</th>
                            <th class="corretas">Corretas</th>
                            <th class="erradas">Erradas</th>
                            <th class="taxa-erro">Taxas de erros</th>
                            <th class="taxa-acerto">Taxa de acertos</th>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="resolucao"><?= $value['resolucao'] ?></td>
                            <td class="corretas"><?= $value['corretas'] ?></td>
                            <td class="erradas"><?= $value['erradas'] ?></td>
                            <td class="taxa-erro"><?= $value['resolucao'] > 0 ? number_format(($value['erradas'] / $value['resolucao']) * 100, 2, ",", ".") . "%" : "0%" ?></td>
                            <td class="taxa-acerto"><?= $value['resolucao'] > 0 ? number_format(($value['corretas'] / $value['resolucao']) * 100, 2, ",", ".") . "%" : "0%" ?></td>
                        </tr>

                    <?php endforeach ?>

                </table>
            <?php endif ?>
        </div>


    </div>


    <div class="geral">
        <div class="form-container">
            <h3>Resultados Gerais</h3>
        </div>
        <hr>
        <div class="result">
            <?php if (!empty($materias)) : ?>

                <div class="result-content">
                    <div class="result-title">Total de Resoluções</div>
                    <div class="result-value resolucao"><?= $valores_totais['total_resolucao']; ?></div>
                </div>
                <div class="result-content">
                    <div class="result-title">Resoluções Corretas</div>
                    <div class="result-value corretas"><?= $valores_totais['total_corretas']; ?></div>
                </div>
                <div class="result-content">
                    <div class="result-title">Resoluções Erradas</div>
                    <div class="result-value erradas"><?= $valores_totais['total_erradas']; ?></div>
                </div>
                <div class="result-content">
                    <div class="result-title">Taxa de erros</div>
                    <div class="result-value taxa-erro"><?= $valores_totais['total_resolucao'] > 0 ? number_format(($valores_totais['total_erradas'] / $valores_totais['total_resolucao']) * 100, 2, ",", ".") . "%" : "0%" ?></div>
                </div>
                <div class="result-content">
                    <div class="result-title">Taxa de acerto</div>
                    <div class="result-value taxa-acerto"><?= $valores_totais['total_resolucao'] > 0 ? number_format(($valores_totais['total_corretas'] / $valores_totais['total_resolucao']) * 100, 2, ",", ".") . "%" : "0%" ?></div>
                </div>
            <?php endif ?>
        </div>

        <br>

        <div>
            <?php if (!empty($materias)) : ?>

                <h2 style="text-align: center;">Desempenho por matéria</h2>
                <table class="table-desempenho">
                    <?php foreach ($materias as $key => $value) : ?>

                        <tr>
                            <th><a href="<?= $base . "/materia/" . $value['id_materia']; ?>"><?= ucwords($key) ?></a></th>
                            <th class="resolucao">Resoluções</th>
                            <th class="corretas">Corretas</th>
                            <th class="erradas">Erradas</th>
                            <th class="taxa-erro">Taxas de erros</th>
                            <th class="taxa-acerto">Taxa de acertos</th>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="resolucao"><?= $value['resolucao'] ?></td>
                            <td class="corretas"><?= $value['corretas'] ?></td>
                            <td class="erradas"><?= $value['erradas'] ?></td>
                            <td class="taxa-erro"><?= $value['resolucao'] > 0 ? number_format(($value['erradas'] / $value['resolucao']) * 100, 2, ",", ".") . "%" : "0%" ?></td>
                            <td class="taxa-acerto"><?= $value['resolucao'] > 0 ? number_format(($value['corretas'] / $value['resolucao']) * 100, 2, ",", ".") . "%" : "0%" ?></td>
                        </tr>

                    <?php endforeach ?>

                </table>
            <?php endif ?>
        </div>


    </div>
</div>

</body>

</html>