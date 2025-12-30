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

require_once('../../../config.php');
require_login();
global $DB;

// Setup page.
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagelayout('base');
$PAGE->set_title('Testing01 Page');
$PAGE->set_heading('Testing01 Heading');
$PAGE->set_url(new moodle_url('/public/local/greetings/index.php'));
echo $OUTPUT->header();

$messageform = new \local_greetings\form\message_form();
$messageform->display();

//get all messages .
if ($data = $messageform->get_data()){
    if(PARAM_TEXT != null) {
        $message = required_param('usermessage', PARAM_TEXT);

        // Inserting into messages table
        $recordmessage = new stdClass;
        $recordmessage->message = $message;
        $recordmessage->timecreated = time();
        $DB->insert_record('local_greetings', $recordmessage);
    } else {
        $message = get_string('mydefaultmessage', 'local_greetings');
    }
    $allmessages = $DB->get_records('local_greetings');
};

$messagewithid5 = $DB->get_record('local_greetings', ['id' => 5]);
if ($messagewithid5) {
    $rendermessageid5 = $messagewithid5->id;
    $rendermessagenumber5 = $messagewithid5->message;
    $rendertimecreatednumber5 = $messagewithid5->timecreated;
}

$templatedata = [
    'renderformmessage' => $message,
    'rendermessageid5' => $rendermessageid5,
    'rendermessagenumber5' => $rendermessagenumber5,
    'rendertimecreatednumber5' => $rendertimecreatednumber5,
];

echo $OUTPUT->render_from_template('local_greetings/greeting_message', $templatedata);
echo $OUTPUT->footer();