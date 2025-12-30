<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * TODO describe file index
 *
 * @package    local_greetings
 * @copyright  2025 YOUR NAME <your@email.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use core_auth\output\login;

require_once('../../../config.php');
require_login();
// Setup page.
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagelayout('base');
$PAGE->set_title('Testing01 Page');
$PAGE->set_heading('Testing01 Heading');
$PAGE->set_url(new moodle_url('/public/local/greetings/index.php'));
echo $OUTPUT->header();
if (isloggedin()) {
    $myuser = get_string('greetingloggedinuser', 'local_greetings', fullname($USER));

} else {
    $myuser = get_string('greetinguser', 'local_greetings');

}



// First paragraph .
$paragraphbefore = 'this is my paragraph';
$renderparagraph01 = get_string('myparagraph', 'local_greetings', $paragraphbefore);

// Second paragraph .
$paragraph2stringclean = get_string('myparagraph2', 'local_greetings');

// Time calculation .
$rendernow = time();
 $rendernowinyears = $rendernow / 3600 / 24 / 365.25 . ' years';


// For float numbers .
$grade = 20.00 / 3;
$rendergrade = format_float($grade, 2);

// Correct array with matching variables .


$messageform = new \local_greetings\form\message_form();
$messageform->display();
    $message = required_param('usermessage', PARAM_TEXT);

$templatedata = [
    'myuser' => $myuser,
    'renderparagraph01' => $renderparagraph01,
    'paragraph2stringclean' => $paragraph2stringclean,
    'rendernow' => $rendernow,
    'rendernowinyears' => $rendernowinyears,
    'rendertime' => time(),
    'rendergrade' => $rendergrade,
    'renderformmessage' => $message,
];



echo $OUTPUT->render_from_template('local_greetings/greeting_message', $templatedata);
echo $OUTPUT->footer();


