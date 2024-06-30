<?php

return [
    "client_id" => env("URPAY_CLIENT_ID"),
    "username" => env("URPAY_USERNAME"),
    "password" => env("URPAY_PASSWORD"),
    "session_language" => env("URPAY_SESSION_LANGUAGE", "EN"),
    "merchant_id" => env("URPAY_MERCHANT_ID"),
    "merchant_wallet_number" => env("URPAY_MERCHANT_WALLET_NUMBER"),
    "terminal_id" => env("URPAY_TERMINAL_ID"),
];
