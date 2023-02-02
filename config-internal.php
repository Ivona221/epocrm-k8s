<?php
return [
  'database' => [
    'driver' => 'pdo_mysql',
    'host' => 'mysql.app3.svc.cluster.local',
    'port' => '',
    'charset' => 'utf8mb4',
    'dbname' => 'espocrm',
    'user' => 'db_user@espocrm-db-single',
    'password' => 'password1!',
    'sslCa' => '/etc/pre-install/DigiCertGlobalRootCA.crt.pem'
  ],
  'logger' => [
    'path' => 'data/logs/espo.log',
    'level' => 'WARNING',
    'rotation' => true,
    'maxFileNumber' => 30,
    'printTrace' => false
  ],
  'restrictedMode' => false,
  'webSocketMessager' => 'ZeroMQ',
  'clientSecurityHeadersDisabled' => false,
  'clientCspDisabled' => false,
  'clientCspScriptSourceList' => [
    0 => 'https://maps.googleapis.com'
  ],
  'isInstalled' => true,
  'microtimeInternal' => 1671050978.556418,
  'passwordSalt' => '89531c4e018eac68',
  'cryptKey' => 'e29f0ce2e8b766d9e532861676d19ce3',
  'hashSecretKey' => 'c20c43c2edb06ca705a067ceac397fee',
  'defaultPermissions' => [
    'user' => 'www-data',
    'group' => 'www-data'
  ],
  'actualDatabaseType' => 'mysql',
  'actualDatabaseVersion' => '8.0.15',
  'webSocketZeroMQSubmissionDsn' => 'tcp://espocrm-websocket:7777',
  'webSocketZeroMQSubscriberDsn' => 'tcp://*:7777'
];