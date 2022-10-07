<?php

class Vartotojai {
    public $name;
    public $surname;
    public $age;
    public $id;
    public $email;
}

class Administratorius extends Vartotojai {
    /*
    public $name;
    public $surname;
    public $age;
    public $id;
    public $email;
    */
    public $role = "admin";
}
class Moderatorius extends Vartotojai {
    /*
    public $name;
    public $surname;
    public $age;
    public $id;
    public $email;
    */
    public $role = "moderator";
}
class Klientas extends Vartotojai {
    /*
    public $name;
    public $surname;
    public $age;
    public $id;
    public $email;
    */
    public $role = "user";
}
class Sveičias extends Vartotojai {
    /*
    public $name;
    public $surname;
    public $age;
    public $id;
    public $email;
    */
    public $role = "quest";
}
?>