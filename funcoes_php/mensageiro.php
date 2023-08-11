<?php

    class mensagem {
        private $status;
        private $mensagem;
        private $objeto;

        /**
         * Esse objeto auxilia na comunicação do sistema e facilita o trabalho do desenvolvedor.
         *
         * $status > É o tipo da mensagem, se for um erro, um sucesso, etc.
         * $mensagem > É a mensagem em texto que descreve o ocorrido.
         * $objeto > É o objeto que a mensagem carrega
         *
         * @author Corrêa <v.victorgabriel2014@gmail.com>
         */
        public function __construct(String $status, String $mensagem, $objeto) {
            $this->status = $status;
            $this->mensagem = $mensagem;
            $this->objeto = $objeto;
        }

        public function __toString(): String {
            if($this->objeto) {
                return "Status: ".$this->status." Mensagem: ".$this->mensagem." Objeto: ".json_encode($this->objeto);
            } else {
                return "Status: ".$this->status." Mensagem: ".$this->mensagem;
            }
        }

        public function get_status(): String {
            return $this->status;
        }
        public function get_mensagem(): String {
            return $this->mensagem;
        }
        public function get_objeto(): Object {
            return $this->objeto;
        }
    }

    class Mensageiro {

        /**
         * Elabora mensagem de erro para o desenvolvedor tratar informações
         * $mensagem > o texto que será incluso na mensagem para descrever o ocorrido
         * $objeto > o objeto que será enviado junto da mensagem para tratamento
         * @return mensagem
         * @author Corrêa <v.victorgabriel2014@gmail.com>
         */
        function _Erro(String $mensagem, $objeto): mensagem {
            if ($objeto != null) {
                return new mensagem("Erro",$mensagem,$objeto);
            } else {
                return new mensagem("Erro",$mensagem, $objeto);
            }
        }

        public function Echo_Erro(String $mensagem, $objeto): String {
            if ($objeto != null) {
                $objeto = json_encode($objeto);
                echo "<div style='background-color: red'>Status: ERRO<br>Mensagem: {$mensagem}<br>Objeto: {$objeto}</div>";
                return "<div>Status: ERRO</div><br>Mensagem: {$mensagem}<br>Objeto: {$objeto}";
            } else {
                echo "<div style='background-color: red'>Status: ERRO<br>Mensagem: {$mensagem}<br>Objeto: {$objeto}</div>";
                return "<div>Status: ERRO</div><br>Mensagem: {$mensagem}<br>";
            }

        }

        function _Sucesso(String $mensagem, $objeto): mensagem {
            if ($objeto != null) {
                return new mensagem("Sucesso",$mensagem, $objeto);
            } else {
                return new mensagem("Sucesso",$mensagem, $objeto);
            }
        }

        public function Echo_Sucesso(String $mensagem, $objeto): String {
            if ($objeto !=null) {
                $objeto = json_encode($objeto);
                echo "<div style='background-color: green'>Status: SUCESSO<br>Mensagem: {$mensagem}<br>Objeto: {$objeto}</div>";
                return "<div>Status: SUCESSO</div><br>Mensagem: {$mensagem}<br>Objeto: {$objeto}";
            } else {
                echo "<div style='background-color: green'>Status: SUCESSO<br>Mensagem: {$mensagem}<br>Objeto: {$objeto}</div>";
                return "<div>Status: SUCESSO</div><br>Mensagem: {$mensagem}<br>";
            }

        }

    }


?>