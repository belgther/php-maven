<?php
/**
   Minimal PHP Maven Repository 0.1
   Copyright (C) 2019 Ibrahim Can Kosker

   This program is free software; you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation; either version 3 of the License, or
   any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program; if not, write to the Free Software Foundation,
   Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301  USA
*/
$prefix = '/maven/';

$users = array(
	'user_one' => 'pass_one'
);

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
	if (!isset($_SERVER['PHP_AUTH_USER'])) {
		http_response_code(401);
	} else if (!isset($users[$_SERVER['PHP_AUTH_USER']]) || $users[$_SERVER['PHP_AUTH_USER']] != $_SERVER['PHP_AUTH_PW']) {
		http_response_code(401);
	} else {
		$my_file = substr($_SERVER['REQUEST_URI'], strlen($prefix));
		$dir = substr($my_file, 0, strrpos($my_file, '/'));
		mkdir ($dir, 777, true);
		$handle = fopen($my_file, 'w');
		$data = file_get_contents('php://input');
		fwrite($handle, $data);
	}
}
?>