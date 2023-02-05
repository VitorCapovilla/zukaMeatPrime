<?php
    require_once('videoDTO.php');
    require_once('../db/bd_gerenciador.php');

    class videoDAO{
        private $con;

        public function __construct(){
            $this->con = GerenciadoraDeConexoes::obter_conexao();
        }

        // Insere Video
        public function inserir($objVideos){
            $meu_resultado = $this->con->query("INSERT INTO videos(titulo, video, descricao, autor, datahora) VALUES ('" 
                . $objVideos->get_titulo() . "', '" . $objVideos->get_video() . "', '" . $objVideos->get_descricao() . "', '" . $objVideos->get_autor() . "', '" . $objVideos->get_datahora() . "')");

            return ($meu_resultado->rowCount() > 0);     
        }

        //Altera Categoria
        function alterar($objVideos){
            $meu_comando = $this->con->query("UPDATE videos SET titulo = '" . $objVideos->get_titulo() . "', video = '". $objVideos->get_titulo() . "', descricao = '" . $objVideos->get_titulo() . "' WHERE (codigo = " . $objVideos->get_codigo(). ")");
            
            if ($meu_comando->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }

        //Excluir Video
        function excluir($codigo){
            $meu_comando = $this->con->query("DELETE FROM videos WHERE (codigo = '" . $codigo . "')");
            
            if ($meu_comando->rowCount() > 0){
                    return true;
                }
                else{
                    return false;
                }
            }

        public function obter_todos(){
            $meu_resultado = $this->con->query("SELECT codigo, titulo, video, descricao, autor, datahora FROM videos");
            $videos = [];

            while($linha = $meu_resultado->fetch(PDO::FETCH_ASSOC)){
                $objvideo = new Video();
                $objvideo->set_codigo($linha['codigo']);
                $objvideo->set_titulo($linha['titulo']);
                $objvideo->set_video($linha['video']);
                $objvideo->set_descricao($linha['descricao']);
                $objvideo->set_autor($linha['autor']);
                $objvideo->set_datahora($linha['datahora']);

                array_push($videos, $objvideo);
            }

            return $videos;
        }

        //Obtem codigo
        function obter($codigo){
            $meu_comando =$this->con->query("SELECT codigo, titulo, video, descricao, autor, datahora FROM videos WHERE (codigo = " . $codigo . ");");
            $linha = $meu_comando->fetch(PDO::FETCH_ASSOC);
            
            $c = new Video();
            $c->set_codigo($linha['codigo']);
            $c->set_titulo($linha['titulo']);
            $c->set_video($linha['video']);
            $c->set_descricao($linha['descricao']);
            $c->set_autor($linha['autor']);
            $c->set_datahora($linha['datahora']);
            
            return $c;
        }
    }
?>