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
        $dataAtutal = $data->format('d/m/Y H:i:s');
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

    public static function getResult() {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT conteudos.id AS id_conteudo, materias.id AS id_materia, materias.materia, conteudos.conteudo, resolucoes.resolucoes, resolucoes.corretas, resolucoes.erradas 
        FROM conteudos 
        INNER JOIN materias ON materias.id = conteudos.id_materia 
        INNER JOIN resolucoes on conteudos.id = resolucoes.id_conteudo ORDER BY materias.materia";    
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($result->rowCount()>0) {
            return $sql;
        } else {
            return false;
        }
    }

    public static function getResultConteudo($id_materia) {
        $pdo = Conection::sqlSelect();

        $sql = "SELECT conteudos.id AS id_conteudo, materias.id AS id_materia, materias.materia, conteudos.conteudo, resolucoes.resolucoes, resolucoes.corretas, resolucoes.erradas 
        FROM conteudos 
        INNER JOIN materias ON materias.id = conteudos.id_materia 
        INNER JOIN resolucoes on conteudos.id = resolucoes.id_conteudo WHERE conteudos.id_materia = $id_materia ORDER BY materias.materia asc";    
        $result = $pdo->query($sql);
        $sql = $result->fetchAll(PDO::FETCH_ASSOC);

        if ($result->rowCount()>0) {
            return $sql;
        } else {
            return false;
        }
    }
}