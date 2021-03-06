<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/corretora/Config/DataBase/dbConfig.php";

    class PessoaProfissaoModel {
        private $bd;

        function __construct(){
            $this->bd = BancoDados::obterConexao();
        }

        public function inserir($idPessoa, $idProfissao){
            $insProf = $this->bd->prepare("INSERT INTO pessoaprofissao(idPessoa, idProfissao) 
                                            VALUES (:idPessoa, :idProfissao)");
            $idPes = intval($idPessoa[0]);
            $idProf = intval($idProfissao[0]);
            $insProf->bindParam(":idPessoa", $idPes, PDO::PARAM_INT);
            $insProf->bindParam(":idProfissao", $idProf, PDO::PARAM_INT);
            $insProf->execute();
        }

        public function deletar($idPessoa){
            $delete = $this->bd->prepare("DELETE FROM pessoaprofissao where idPessoa = :idPessoa");
            $delete->bindParam(":idPessoa", $idPessoa);
            $delete->execute();
        }
    }

?>
