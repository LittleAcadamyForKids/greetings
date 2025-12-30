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

namespace local_greetings\form;

// defined('MOODLE_INTERNAL') || die();

/**
 * Class myform
 *
 * @package    local_greetings
 * @copyright  2025 YOUR NAME <your@email.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 *
 */
// Load the form lib
require_once($CFG->libdir . '/formslib.php');
class message_form extends \moodleform {
    /**
     * Define the form.
     */
    public function definition() {
        $mform = $this->_form; // Don't forget the underscore!

        $mform->addElement('textarea', 'usermessage', get_string('messagelabel', 'local_greetings')); // Add elements to your form.
        $mform->setType('usermessage', PARAM_TEXT); // Set type of element.

        $submitlabel = get_string('enteryourmessage', 'local_greetings' );
        $mform->addElement('submit', 'submitmessage', $submitlabel);
    }
}