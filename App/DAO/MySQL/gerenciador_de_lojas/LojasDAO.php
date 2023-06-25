<?php 

namespace  App\DAO\MySQL\gerenciador_de_lojas;
use App\Models\MySQL\gerenciador_de_lojas\LojaModel;

class lojasDAO extends Conexao
{
    #Isso faz executa o construtor do codigo obsrato dando acesso a todos atributos
    public function __construct()
    {
        parent::__construct();
    }


    public function getAllLojas(): array
    {
        $lojas = $this->pdo
            ->query('SELECT
                        id,
                        nome,
                        telefone,
                        endereco 
                FROM lojas;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return $lojas;
    }


    public function insertLoja(LojaModel $loja): void
    {
        $statement = $this->pdo
            ->prepare('INSERT INTO lojas VALUES(
                null,
                :nome,
                :telefone,
                :endereco
            );');
        $statement->execute([
            'nome' => $loja->getNome(),
            'telefone' => $loja->getTelefone(),
            'endereco' => $loja->getEndereco()
        ]);
    }
    public function updateLoja(LojaModel $loja): void
    {
        $statement = $this->pdo
            ->prepare('UPDATE lojas SET
                    nome = :nome,
                    telefone = :telefone,
                    endereco = :endereco
                WHERE
                    id = :id
            ;');
        $statement->execute([
            'nome' => $loja->getNome(),
            'telefone' => $loja->getTelefone(),
            'endereco' => $loja->getEndereco(),
            'id' => $loja->getId()
        ]);
    }

    public function deleteLoja(int $id): void
    {
        $statement = $this->pdo
            ->prepare('DELETE FROM lojas WHERE id = :id;');
        $statement->execute([
            'id' => $id
        ]);
    }
}