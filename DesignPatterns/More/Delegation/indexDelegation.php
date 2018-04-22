<?php
echo '---- more > Delegation <br><br>';

/* more > Delegation
 * Phái đoàn:
 *
 */

class JuniorDeveloper
{
    public function writeBadCode()
    {
        return 'Some junior developer generated code...';
    }
}

class TeamLead
{
    /**
     * @var JuniorDeveloper
     */
    private $junior;

    /**
     * @param JuniorDeveloper $junior
     */
    public function __construct(JuniorDeveloper $junior)
    {
        $this->junior = $junior;
    }

    public function writeCode()
    {
        return $this->junior->writeBadCode();
    }
}

echo '<br><br> TeamLead <br>';
$juniorDeveloper = new JuniorDeveloper();
$teamLead = new TeamLead($juniorDeveloper);
echo $teamLead->writeCode();


echo '<br><br>  <br>';








