<?php
echo '---- Structural > Dependency Injection <br><br>';

/* Structural > DependencyInjection
 *
 *
 */

class DatabaseConfiguration
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    public function __construct($host, $port, $username, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }
}

class DatabaseConnection
{
    /**
     * @var DatabaseConfiguration
     */
    private $configuration;

    /**
     * @param DatabaseConfiguration $config
     */
    public function __construct(DatabaseConfiguration $config)
    {
        $this->configuration = $config;
    }

    public function getDsn()
    {
        // this is just for the sake of demonstration, not a real DSN
        // notice that only the injected config is used here, so there is
        // a real separation of concerns here

        return sprintf(
            '%s:%s@%s:%d',
            $this->configuration->getUsername(),
            $this->configuration->getPassword(),
            $this->configuration->getHost(),
            $this->configuration->getPort()
        );
    }
}

echo '<br><br> DatabaseConfiguration <br>';
$dbConfig = new DatabaseConfiguration('127.0.0.1', 80, 'root', '123');
echo $dbConfig->getHost() .' <br>';
echo $dbConfig->getPort() .' <br>';
echo $dbConfig->getUsername() .' <br>';
echo $dbConfig->getPassword() .' <br>';

echo '<br><br> $dbConnect->getDsn() <br>';
$dbConnect = new DatabaseConnection($dbConfig);
echo $dbConnect->getDsn();













