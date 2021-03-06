<?php

namespace SSPro\Controller;


/**
 * Class Base
 *
 * Abstract class which provides several key functions to derrived classes
 *
 * @package
 */
abstract class Base
{
    /**
     * Redirects unauthorised access to some Views back to the account view
     *
     * eg - A logged in user does not need to see the login page.
     */
    public function isLoggedIn()
    {
        if (isset($_SESSION['id'])) {
            header('location: /welcome');
            die();
        }
    }

    /**
     * Redirects unauthorised access to 'logged in' Views back to the login page
     *
     * eg - if a non logged in user tries to access the products page.
     */
    public function isNotLoggedIn()
    {
        if (!isset($_SESSION['id'])) {
            header('location: /login');
            die();
        }
        if (isset($_SESSION) && $_SESSION['user_type'] != 'student') {
            header('location: /showcurrentstudents');
            die();
        }
    }



    /**
     * Checks to see whether the user is an admin
     *   - If they are not an admin, they are directed back to the welcome page
     * @return bool
     */
    public function isAdminLoggedIn()
    {
        if (isset($_SESSION['id'])) {
            if ($_SESSION['user_type'] != 'admin') {
                header('location: /welcome');
                die();
            }
            return true;
        }
    }


    /**
     *  This method directs controller data to the base view
     *
     * @param $title - The title of the web page loaded
     * @param $name - name of the view to be loaded
     * @param array $data - any data required by the view
     */
    public function render($title, $name, $data = array())
    {

        $pageTitle = $title;

        $viewName = $name;

        $viewData = $data;

        include ('Views/base.view.php');
    }

    public function renderAjax($name, $data = array())
    {

        $viewName = $name;

        $viewData = $data;

        include ("Views/" . $name . ".php");
    }
}

