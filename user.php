<!-- could be obsolete since we should be using cookies to store info -->
<?php
class User
{
    private $id;
    private $email;
    private $fname;
    private $lname;
    private $privilege;

    function __construct($id, $email, $fname, $lname, $privilege)
    {
        $this->email = $email;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->id = $id;
        $this->privilege = $privilege;
    }

    function get_email()
    {
        return $this->email;
    }

    function get_fname()
    {
        return $this->fname;
    }

    function get_lname()
    {
        return $this->lname;
    }

    function get_id()
    {
        return $this->id;
    }

    function get_privilege()
    {
        return $this->privilege;
    }
}
?>