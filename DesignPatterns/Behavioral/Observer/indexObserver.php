<?php
echo '---- Behavioral > Observer <br><br>';

/* Behavioral > Observer
 *
 * người quan sát
 */

class User implements \SplSubject
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var \SplObjectStorage
     */
    private $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    public function attach(\SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    public function changeEmail($email)
    {
        $this->email = $email;
        $this->notify();
    }

    public function notify()
    {
        /** @var \SplObserver $observer */
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}

class UserObserver implements \SplObserver
{
    /**
     * @var User[]
     */
    private $changedUsers = [];

    /**
     * It is called by the Subject, usually by SplSubject::notify()
     *
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        $this->changedUsers[] = clone $subject;
    }

    /**
     * @return User[]
     */
    public function getChangedUsers()
    {
        return $this->changedUsers;
    }
}

$user = new User();
$userObserver = new UserObserver();

echo '<br>- $user <br>';

echo '<br> user->attach($userObserver) <br>';
echo $user->attach($userObserver);

echo '<br> user->detach() <br>';
echo $user->detach($userObserver);

echo '<br> user->changeEmail("audi@gmail.com") <br>';
echo $user->changeEmail("audi@gmail.com");

echo '<br> user->notify() <br>';
echo $user->notify();

echo '<br>- $userObserver <br>';

echo '<br> $userObserver->update($user) <br>';
echo $userObserver->update($user);

echo '<br> $userObserver->getChangedUsers() <br>';
echo '<pre>';
print_r($userObserver->getChangedUsers());
echo '</pre>';

