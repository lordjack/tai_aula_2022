<?php
include "../Config.php";
class BD
{

    public function conn()
    {
        $conn = "mysql:host=" . Config::BD_HOST . ";
            dbname=" . Config::BD_NOME . ";port=" . Config::BD_PORT;

        return new PDO(
            $conn,
            Config::BD_USUARIO,
            Config::BD_SENHA,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . Config::BD_CHARSET]
        );
    }
    public function select($nome_tabela)
    {
        $conn = $this->conn();
        $st = $conn->prepare("SELECT * FROM $nome_tabela");
        $st->execute();

        return $st;
    }

    public function inserir($nome_tabela, $dados)
    {
        $conn = $this->conn();
        $sql = "INSERT INTO $nome_tabela (";
        unset($dados['id']);//remove campo id do vetor dados
        $flag = 0;
        foreach ($dados as $campo => $valor) {
            $sql .= ($flag == 0) ? " $campo" : ", $campo";
            /*
            if ($flag == 0) {
                $sql .= "$campo";
            } else {
                $sql .= ", $campo";
            }*/
            $flag = 1;
        }
        $sql .= ") value (";
        $flag = 0;
        $arrayDados = [];
        foreach ($dados as $valor) {
            $sql .= ($flag == 0) ? " ?" : ", ?";
            /*
            if ($flag == 0) {
                $sql .= " ?";
            } else {
                $sql .= ", ?";
            }
            */
            $flag = 1;
            $arrayDados[] = $valor;
        }
        $sql .= ")";

        $st = $conn->prepare($sql);
        $st->execute($arrayDados);

        return $st;
    }

    public function update($nome_tabela, $dados)
    {
        $id = $dados["id"];
        $conn = $this->conn();
        $sql = "UPDATE $nome_tabela SET ";

        $flag = 0;
        $arrayDados = [];
        foreach ($dados as $campo => $valor) {
            if ($flag == 0) {
                $sql .= " $campo = ?";
            } else {
                $sql .= ", $campo = ?";
            }
            $flag = 1;
            $arrayDados[] = $valor;
        }
        $sql .= " WHERE id = $id";
        $st = $conn->prepare($sql);
        $st->execute($arrayDados);

        return $st;
    }

    public function remover($nome_tabela, $id)
    {
        $conn = $this->conn();
        $sql = "DELETE FROM $nome_tabela WHERE id = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [$id];
        $st->execute($arrayDados);

        return $st;
    }

    public function buscar($nome_tabela, $id)
    {
        $conn = $this->conn();
        $sql = "SELECT * FROM $nome_tabela WHERE id = ?";

        $st = $conn->prepare($sql);
        $arrayDados = [$id];
        $st->execute($arrayDados);

        return $st->fetchObject();
    }

    public function pesquisar($nome_tabela, $dados)
    {
        $tipo = $dados['tipo'];
        $conn = $this->conn();
        $sql = "SELECT * FROM $nome_tabela WHERE $tipo LIKE ?";

        $st = $conn->prepare($sql);
        $arrayDados = ["%" . $dados["valor"] . "%"];
        $st->execute($arrayDados);

        return $st;
    }
}
