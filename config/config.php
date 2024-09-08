<?php

return [
    "test_base_url" => env("URPAY_TEST_BASE_URL", "https://walletsit.neoleap.com.sa/merchantb2b"),
    "live_live_url" => env("URPAY_LIVE_BASE_URL", "https://wallet.neoleap.com.sa/merchantb2b"),
    "mode" => env("URPAY_MODE", "test"),
    "client_id" => env("URPAY_CLIENT_ID"),
    "username" => env("URPAY_USERNAME"),
    "password" => env("URPAY_PASSWORD"),
    "session_language" => env("URPAY_SESSION_LANGUAGE", "EN"),
    "merchant_id" => env("URPAY_MERCHANT_ID"),
    "merchant_wallet_number" => env("URPAY_MERCHANT_WALLET_NUMBER"),
    "terminal_id" => env("URPAY_TERMINAL_ID"),
];
