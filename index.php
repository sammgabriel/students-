<?php

//Required files
require_once 'vendor/autoload.php';
require_once 'model/db-functions.php';

//Start session AFTER autoload
session_start();

//Create an instance of the Base class
$f3 = Base::instance();

//Debugging
//require_once '/home/tostrand/public_html/debug.php';

//Connect to the database
$dbh = connect();

//Define a default route
$f3->route('GET /', function($f3) {

    $students = getStudents();
    $f3->set('students', $students);

    //load a template
    $template = new Template();
    echo $template->render('views/all-students.html');
});

//Define a route to view a student summary
$f3->route('GET /summary/@sid',

    function($f3, $params)
    {

    // Define parameters
    $sid = $params['sid'];

    // Create a student object
    $student = getStudent($sid);

    // Set object variables
    $f3->set('student', $student);
    $f3->set('first', $student->getFirst());
    $f3->set('last', $student->getLast());
    $f3->set('sid', $student->getSid());
    $f3->set('birthdate', $student->getBirthdate());
    $f3->set('gpa', $student->getGpa());

    if ($student->getGpa() >= 2.0)
    {

        $f3->set('isPassing', "Passing");

    } else
    {

        $f3->set('isPassing', "Failing");
    }

    //load a template
    $template = new Template();
    echo $template->render('views/view-student.html');
});

//Define a route to add a student
$f3->route('GET|POST /add', function($f3) {

    //print_r($_POST);
    /*
     * Array (  [sid] => 5678
     *          [last] => Shin
     *          [first] => Jen
     *          [birthdate] => 2000-08-08
     *          [gpa] => 4.0
     *          [advisor] => 1
     *          [submit] => Submit )
     */

    if(isset($_POST['submit'])) {

        //Get the form data
        $sid = $_POST['sid'];
        $last = $_POST['last'];
        $first = $_POST['first'];
        $birthdate = $_POST['birthdate'];
        $gpa = $_POST['gpa'];
        $advisor = $_POST['advisor'];

        //Validate the data

        //Add the student
        $success = addStudent($sid, $last, $first, $birthdate,
            $gpa, $advisor);
        if($success) {
            $student = new Student($sid, $last, $first, $birthdate,
                $gpa, $advisor);
            $_SESSION['student'] = $student;

            $f3->reroute('/summary/' . $sid);
        }
    }

    //load a template
    $template = new Template();
    echo $template->render('views/add-student.html');
});

//Run fat free
$f3->run();
