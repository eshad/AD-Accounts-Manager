<?php

/*
 * The MIT License
 *
 * Copyright 2020 cjacobsen.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace App\Controllers\Api;

/**
 * Description of App
 *
 *
 * @author cjacobsen
 * @deprecated
 */
class App extends APIController {

    const GET_APP_SETTINGS = "getApplicationSettings";
    const GET_AUTH_SETTINGS = "getAuthenticationSettings";
    const GET_EMAIL_SETTINGS = "getEmailSettings";
    const GET_NOTIF_SETTINGS = "getNotificationSettings";
    const GET_CONFIG = "getConfiguration";

    protected function getApplicationSettings() {
        return $this->returnHTML($this->view('settings/application'));
    }

    protected function getAuthenticationSettings() {
        return $this->returnHTML($this->view('settings/authentication'));
    }

    protected function getEmailSettings() {
        return $this->returnHTML($this->view('settings/email'));
    }

    protected function getNotificationSettings() {
        return $this->returnHTML($this->view('settings/notification'));
    }

    private function printConfig() {
        if ($this->user->privilege >= \App\Models\User\Privilege::ADMIN) {
            $output = "<h1>Configuration Database</h1>";
            foreach (\system\Database::get()->getAllTables()as $table) {
                $output .= "<h3>" . $table . "</h3>";
                $output .= $this->html_table(\system\Database::get()->query("SELECT * FROM " . $table));
                //ob_start();
                //var_dump(\system\Database::get()->query("SELECT * FROM " . $table));
                //$this->output .= ob_get_clean();
            }
        }
        return $this->returnHTML($output);
    }

    public function getConfiguration() {
        return $this->printConfig();
    }

    private function html_table($data = array()) {
        $rows = array();

        foreach ($data as $row) {
            $cells = array();
            foreach ($row as $cell) {
                $cells[] = "<td>{$cell}</td>";
            }

            $rows[] = "<tr>" . implode('', $cells) . "</tr>";
        }
        return "<table class='table hci-table'>" . implode('', $rows) . "</table>";
    }

}
