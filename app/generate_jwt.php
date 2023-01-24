<?php

declare(strict_types=1);

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;

require_once 'vendor/autoload.php';

class JWTGenerate
{
    public $secret_key;
    public $payload;
    public $domainName;
    public $date;
    public $expire_at;

    public function __construct()
    {
        $this->secret_key  = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';
        $this->date   = new DateTimeImmutable();
        $this->expire_at     = $this->date->modify('+120 minutes')->getTimestamp();      // Add 60 seconds
        $this->domainName = URLROOT;
    }

    public function generate($userId)
    {
        $this->payload = [
            'iat'  => $this->date->getTimestamp(),         // Issued at: time when the token was generated
            'iss'  => $this->domainName,                       // Issuer
            'nbf'  => $this->date->getTimestamp(),         // Not before
            'exp'  => $this->expire_at,                           // Expire
            'userId' => $userId,
        ];

        return JWT::encode($this->payload, $this->secret_key, 'HS512');
    }

    public static function getToken()
    {
        if (isset($_COOKIE["jwt"])) {
            if ($_COOKIE["jwt"] === "" || $_COOKIE["jwt"] === null || $_COOKIE["jwt"] === 0 || $_COOKIE["jwt"] === false) {
                redirect("authenticate/login");
                exit;
            } else {
                return $_COOKIE["jwt"];
            }
        }
    }

    public static function validate()
    {
        $tokenInCookie = JWTGenerate::getToken();
        if (!$tokenInCookie) {
            redirect("authenticate/login");
            exit();
        };

        if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'UPDATE') {
            $jwt = $tokenInCookie;
            if (!$jwt) {
                //die("no jwt");
                //redirect("authenticate/login");
                return false;
                exit;
            }

            $secret_key = '68V0zWFrS72GbpPreidkQFLfj4v9m3Ti+DXc8OB0gcM=';
            try {
                $token = JWT::decode($jwt, new Key($secret_key, 'HS512'));
                $userId = $token->userId;
                return $userId;
            } catch (ExpiredException $e) {
                redirect("authenticate/login");
            }

            $now = new DateTimeImmutable();
            $serverName = URLROOT;

            if (
                $token->iss !== $serverName ||
                $token->nbf > $now->getTimestamp() ||
                $token->exp < $now->getTimestamp()
            ) {
                return false;
            } else {
                return true;
            }
        }
    }
}
