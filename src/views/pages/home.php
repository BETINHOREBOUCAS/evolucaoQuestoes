<?php $render('header'); ?>


<div class="content">
    <div class="geral">
        <div class="form-container">
            <form method="get">
                <div class="form">
                    <select name="disciplina">
                        <option value="">Geral</option>
                        <option value="administrativo">Direito Administrativo</option>
                    </select>

                    <input type="date" name="dataInicial" title="Período Inicial">

                    <input type="date" name="dataFinal" title="Período Final">

                    <input type="button" value="Gerar">
                </div>
            </form>
        </div>
        <hr>
        <div class="result">
            <div class="result-content">
                <div class="result-title">Total de Resoluções</div>
                <div class="result-value">10</div>
            </div>
            <div class="result-content">
                <div class="result-title">Resoluções Corretas</div>
                <div class="result-value">10</div>
            </div>
            <div class="result-content">
                <div class="result-title">Resoluções Erradas</div>
                <div class="result-value">10</div>
            </div>
            <div class="result-content">
                <div class="result-title">Taxa de erros</div>
                <div class="result-value">10%</div>
            </div>
            <div class="result-content">
                <div class="result-title">Taxa de acerto</div>
                <div class="result-value">10%</div>
            </div>
        </div>
        <div>
            <table border="1">
                <tr>
                    <th>Company</th>
                    <th>Contact</th>
                    <th>Country</th>
                </tr>
                <tr>
                    <td>Alfreds Futterkiste</td>
                    <td>Maria Anders</td>
                    <td>Germany</td>
                </tr>
                <tr>
                    <td>Centro comercial Moctezuma</td>
                    <td>Francisco Chang</td>
                    <td>Mexico</td>
                </tr>
            </table>
        </div>
    </div>


    <div class="info">
    </div>
</div>



</body>

</html>