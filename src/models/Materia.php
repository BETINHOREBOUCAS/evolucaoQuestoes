<?php
namespace src\models;
use \core\Model;
use DateTime;
use DateTimeZone;
use PDO;

class Materia extends Model {

    public static function add($table, $dados) {

        $data = new DateTime();
        $data->setTimezone(new DateTimeZone('America/Fortaleza'));
        $dataAtutal = $data->format('Y/m/d H:i:s');
        $dados['data_inclusao'] = $dataAtutal;

        $pdo = Conection::sqlSelect();

        foreach ($dados as $key => $value) {
            $keyBind[] = ":$key";
            $valueData[] = $value;
        }

        $key = implode(', ', array_keys($dados));
        $keyBindStr = implode(', ', $keyBind);

        $sql = "INSERT INTO $table ($key) VALUES ($keyBindStr)";

        $sql = $pdo->prepare($sql);
        for ($i = 0; $i < count($dados); $i++) {
            $sql->bindValue("$keyBind[$i]", "$valueData[$i]");
        }

        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            return $pdo->lastInsertId();;
        }
    }

    public static function getInfo($table) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT * FROM `$table`";    
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($result->rowCount()>0) {
            return $sql;
        } else {
            return false;
        }
    }

    public static function getResult($mesAtual, $mesAnterior) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT conteudos.id AS id_conteudo, materias.id AS id_materia, materias.materia, conteudos.conteudo, resolucoes.resolucoes, resolucoes.corretas, resolucoes.erradas 
        FROM conteudos 
        INNER JOIN materias ON materias.id = conteudos.id_materia 
        INNER JOIN resolucoes on conteudos.id = resolucoes.id_conteudo WHERE resolucoes.data_inclusao BETWEEN '2022-$mesAtual-01' AND '2022-$mesAtual-31' ORDER BY materias.materia";    
        $result = $pdo->query($sql);
        $dados["infoMesAtual"] = $result->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT conteudos.id AS id_conteudo, materias.id AS id_materia, materias.materia, conteudos.conteudo, resolucoes.resolucoes, resolucoes.corretas, resolucoes.erradas 
        FROM conteudos 
        INNER JOIN materias ON materias.id = conteudos.id_materia 
        INNER JOIN resolucoes on conteudos.id = resolucoes.id_conteudo WHERE resolucoes.data_inclusao BETWEEN '2022-$mesAnterior-01' AND '2022-$mesAnterior-31' ORDER BY materias.materia";    
        $result = $pdo->query($sql);
        $dados["infoMesAnterior"] = $result->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT conteudos.id AS id_conteudo, materias.id AS id_materia, materias.materia, conteudos.conteudo, resolucoes.resolucoes, resolucoes.corretas, resolucoes.erradas 
        FROM conteudos 
        INNER JOIN materias ON materias.id = conteudos.id_materia 
        INNER JOIN resolucoes on conteudos.id = resolucoes.id_conteudo ORDER BY materias.materia";    
        $result = $pdo->query($sql);
        $dados["infoTotal"] = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($result->rowCount()>0) {
            return $dados;
        } else {
            return false;
        }
    }

    public static function getResultConteudo($id_materia, $mesAtual, $mesAnterior) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT conteudos.id AS id_conteudo, materias.id AS id_materia, materias.materia, conteudos.conteudo, resolucoes.resolucoes, resolucoes.corretas, resolucoes.erradas 
        FROM conteudos 
        INNER JOIN materias ON materias.id = conteudos.id_materia 
        INNER JOIN resolucoes on conteudos.id = resolucoes.id_conteudo WHERE conteudos.id_materia = $id_materia AND resolucoes.data_inclusao BETWEEN '2022-$mesAtual-01' AND '2022-$mesAtual-31' ORDER BY materias.materia asc";    
        $result = $pdo->query($sql);
        $dados["infoMesAtual"] = $result->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT conteudos.id AS id_conteudo, materias.id AS id_materia, materias.materia, conteudos.conteudo, resolucoes.resolucoes, resolucoes.corretas, resolucoes.erradas 
        FROM conteudos 
        INNER JOIN materias ON materias.id = conteudos.id_materia 
        INNER JOIN resolucoes on conteudos.id = resolucoes.id_conteudo WHERE conteudos.id_materia = $id_materia AND resolucoes.data_inclusao BETWEEN '2022-$mesAnterior-01' AND '2022-$mesAnterior-31' ORDER BY materias.materia asc";    
        $result = $pdo->query($sql);
        $dados["infoMesAnterior"] = $result->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT conteudos.id AS id_conteudo, materias.id AS id_materia, materias.materia, conteudos.conteudo, resolucoes.resolucoes, resolucoes.corretas, resolucoes.erradas 
        FROM conteudos 
        INNER JOIN materias ON materias.id = conteudos.id_materia 
        INNER JOIN resolucoes on conteudos.id = resolucoes.id_conteudo WHERE conteudos.id_materia = $id_materia ORDER BY materias.materia asc";    
        $result = $pdo->query($sql);
        $dados["infoTotal"] = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($result->rowCount()>0) {
            return $dados;
        } else {
            return false;
        }
    }
}