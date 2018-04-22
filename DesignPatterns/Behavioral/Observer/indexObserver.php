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

    public function changeEmail(string $email)
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
echo '<br><br> user->attach() <br>';
echo $user->attach();

echo '<br><br> user->detach() <br>';
echo $user->detach();

echo '<br><br> user->changeEmail("audi@gmail.com") <br>';
echo $user->changeEmail("audi@gmail.com");

echo '<br><br> user->notify() <br>';
echo $user->notify();

$userObserver = new UserObserver();
echo '<br><br> user->update() <br>';
echo $userObserver->update();

echo '<br><br> user->getChangedUsers() <br>';
echo $userObserver->getChangedUsers();

