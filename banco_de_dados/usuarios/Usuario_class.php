<?php

use function PHPSTORM_META\type;

    class Usuario {

        private $id;
        private String $nome;
        private String $email;
        private String $senha;
        private int $status;
        private $logado = false;

        public function __construct(String $id, String $nome, String $email, String $senha, String $status) {

            try {
                $this->id = (int) $id;
            } catch (Exception) {
                $this->id = 'null';
            }

            try {
                $this->nome = (String) $nome;
            } catch (Exception) {
                $this->nome = 'null';
            }

            $is_email = filter_var($email,FILTER_VALIDATE_EMAIL);
            if ($is_email) {
                $this->email = $email;
            } else {
                $this->email = 'null';
            }

            if ($senha != '' && $senha != 'null') {
                $this->senha = $senha;
            } else {
                $this->senha = 'null';
            }

            if ($status != '' && $status != 'null' && ($status == "0" || $status == "1")) {
                $this->status = (int) $status;
            } else {
                $this->status = 0;
            }

        }

        public function toggle_logado() {
            if ($this->logado) {
                $this->logado = false;
            } else if (!$this->logado && $this->nome != 'null') {
                $this->logado = true;
            }
        }

        function get_nome(): String {
            return $this->nome;
        }
        function get_email(): String {
            return $this->email;
        }
        function get_senha(): String {
            return $this->senha;
        }
        function get_status(): int {
            return $this->status;
        }
        function get_logado(): bool {
            return $this->logado;
        }

    }



?>