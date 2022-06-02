<?php
//$materia_atual = ucwords($materiaAtual['materia']);
$render('header', ["titulo" => ""]);
?>

<pre>
<?php

//print_r($viewData);
$resolucaoTotal = 0;
$corretasTotal = 0;
$erradasTotal = 0;

$Anterior = 0;
$corretasAtual = 0;
$erradasAtual = 0;

$resolucaoAnterior = 0;
$corretasAnterior = 0;
$erradasAnterior = 0;

foreach ($materiasTotal as $key => $value) {
    $resolucaoTotal += $value['resolucao'];
    $corretasTotal += $value['corretas'];
    $erradasTotal += $value['erradas'];
}

foreach ($materiasMesAtual as $key => $value) {
    $Anterior += $value['resolucao'];
    $corretasAtual += $value['corretas'];
    $erradasAtual += $value['erradas'];
}

foreach ($materiasMesAnterior as $key => $value) {
    $resolucaoAnterior += $value['resolucao'];
    $corretasAnterior += $value['corretas'];
    $erradasAnterior += $value['erradas'];
}

?>
</pre>

<div class="content">
    <div class="geral">
        <div class="form-container">
            <form method="get">
                <div class="form">
                    <a href="<?= $base; ?>">
                        <div class="icon" style="color: blue;" title="Página Inicial"><i class="fa-solid fa-house"></i></div>
                    </a>

                    <input type="date" name="dataInicial" title="Período Inicial">

                    <input type="date" name="dataFinal" title="Período Final">

                    <input type="submit" value="Gerar">
                </div>
            </form>
        </div>
        <div class="form-container">
            <form method="post" action="<?= $base; ?>/materia/<?= $materiaAtual['id_materia'] ?>/add">
                <div class="form">

                    <input type="hidden" name="id_materia" value="<?= $materiaAtual['id_materia']; ?>">

                    <input type="text" name="conteudo" placeholder="Ex: Princípios da Constituição" autocomplete="off">

                    <input type="submit" value="Adicionar Conteúdo">
                </div>
            </form>
        </div>
        <hr>
        <div class="form-container">
            <h3>Resultados Gerais</h3>
        </div>
        <hr>
        <div class="result">
            <div class="result-content">
                <div class="result-title">Total de Resoluções</div>
                <div class="result-value resolucao"><?= $resolucaoTotal; ?></div>
            </div>
            <div class="result-content">
                <div class="result-title">Resoluções Corretas</div>
                <div class="result-value corretas"><?= $corretasTotal; ?></div>
            </div>
            <div class="result-content">
                <div class="result-title">Resoluções Erradas</div>
                <div class="result-value erradas"><?= $erradasTotal; ?></div>
            </div>
            <div class="result-content">
                <div class="result-title">Taxa de Erros</div>
                <div class="result-value taxa-erro"><?= $resolucaoTotal > 0 ? number_format(($erradasTotal / $resolucaoTotal) * 100, '2', ',', '.') : 0 ?>%</div>
            </div>
            <div class="result-content">
                <div class="result-title">Taxa de Acertos</div>
                <div class="result-value taxa-acerto"><?= $resolucaoTotal > 0 ? number_format(($corretasTotal / $resolucaoTotal) * 100, '2', ',', '.') : 0 ?>%</div>
            </div>
        </div>
        <br>
        <div>
            <?php if (!empty($materiasTotal)) : ?>
                <h2 style="text-align: center;">Desempenho por conteúdo</h2>
                <table class="table-desempenho">
                    <?php foreach ($materiasTotal as $key => $value) : ?>
                        <tr>
                            <th><?= ucwords($key) ?></th>
                            <th class="resolucao">Resoluções</th>
                            <th class="corretas">Corretas</th>
                            <th class="erradas">Erradas</th>
                            <th class="taxa-erro">Taxas de Erros</th>
                            <th class="taxa-acerto">Taxa de Acertos</th>
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
        <h3 style="text-align: center;">Adicionar Informações</h3>
        <form method="post">
            <div style="text-align: center;">
                <label for="conteudo">Conteúdo</label>
                <select name="conteudo" required>
                    <option></option>
                    <?php foreach ($materiasTotal as $key => $value) : ?>
                        <option value="<?= $value['id_conteudo'] ?>"><?= ucwords($key); ?></option>
                    <?php endforeach ?>
                </select>

                <label for="resolucao">Questões Resolvidas</label>
                <input type="number" name="resolucao" required autocomplete="off">

                <label for="certa">Nº de Acertos</label>
                <input type="number" name="certa" required autocomplete="off">

                <label for="erradas">Nº de Erros</label>
                <input type="number" name="erro" required autocomplete="off">

                <input type="submit" value="Adicionar">
            </div>
        </form>
    </div>

</div>

<div class="info-secundaria-geral">
    <div class="geral">
        <div class="form-container">
            <h3>Mês Atual</h3>
        </div>

        <hr>
        <div class="result">
            <div class="result-content">
                <div class="result-title">Total de Resoluções</div>
                <div class="result-value resolucao"><?= $Anterior; ?></div>
            </div>
            <div class="result-content">
                <div class="result-title">Resoluções Corretas</div>
                <div class="result-value corretas"><?= $corretasAtual; ?></div>
            </div>
            <div class="result-content">
                <div class="result-title">Resoluções Erradas</div>
                <div class="result-value erradas"><?= $erradasAtual; ?></div>
            </div>
            <div class="result-content">
                <div class="result-title">Taxa de Erros</div>
                <div class="result-value taxa-erro"><?= $Anterior > 0 ? number_format(($erradasAtual / $Anterior) * 100, '2', ',', '.') : 0 ?>%</div>
            </div>
            <div class="result-content">
                <div class="result-title">Taxa de Acertos</div>
                <div class="result-value taxa-acerto"><?= $Anterior > 0 ? number_format(($corretasAtual / $Anterior) * 100, '2', ',', '.') : 0 ?>%</div>
            </div>
        </div>
        <br>
        <div>
            <?php if (!empty($materiasMesAtual)) : ?>
                <h2 style="text-align: center;">Desempenho por conteúdo</h2>
                <table class="table-desempenho">
                    <?php foreach ($materiasMesAtual as $key => $value) : ?>
                        <tr>
                            <th><?= ucwords($key) ?></th>
                            <th class="resolucao">Resoluções</th>
                            <th class="corretas">Corretas</th>
                            <th class="erradas">Erradas</th>
                            <th class="taxa-erro">Taxas de Erros</th>
                            <th class="taxa-acerto">Taxa de Acertos</th>
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
            <h3>Mes Anterior</h3>
        </div>

        <hr>
        <div class="result">
            <div class="result-content">
                <div class="result-title">Total de Resoluções</div>
                <div class="result-value resolucao"><?= $resolucaoAnterior; ?></div>
            </div>
            <div class="result-content">
                <div class="result-title">Resoluções Corretas</div>
                <div class="result-value corretas"><?= $corretasAnterior; ?></div>
            </div>
            <div class="result-content">
                <div class="result-title">Resoluções Erradas</div>
                <div class="result-value erradas"><?= $erradasAnterior; ?></div>
            </div>
            <div class="result-content">
                <div class="result-title">Taxa de Erros</div>
                <div class="result-value taxa-erro"><?= $resolucaoAnterior > 0 ? number_format(($erradasAnterior / $resolucaoAnterior) * 100, '2', ',', '.') : 0 ?>%</div>
            </div>
            <div class="result-content">
                <div class="result-title">Taxa de Acertos</div>
                <div class="result-value taxa-acerto"><?= $resolucaoAnterior > 0 ? number_format(($corretasAnterior / $resolucaoAnterior) * 100, '2', ',', '.') : 0 ?>%</div>
            </div>
        </div>
        <br>
        <div>
            <?php if (!empty($materias)) : ?>
                <h2 style="text-align: center;">Desempenho por conteúdo</h2>
                <table class="table-desempenho">
                    <?php foreach ($materias as $key => $value) : ?>
                        <tr>
                            <th><?= ucwords($key) ?></th>
                            <th class="resolucao">Resoluções</th>
                            <th class="corretas">Corretas</th>
                            <th class="erradas">Erradas</th>
                            <th class="taxa-erro">Taxas de Erros</th>
                            <th class="taxa-acerto">Taxa de Acertos</th>
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