<?php
session_start();
header("Content-type: text/css");
$background_ = '66B2FF';
if(isset($_SESSION['background'])){
	$background_ = $_SESSION['background'];
}
?>

@import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700');

body {
	background-color: <?=$background_?>;
	font-family: 'Roboto', sans-serif;
}

.title {
	text-align: center;
	margin-top: 50px;
	font-family: 'Roboto', sans-serif;
}

h1 {
	color: white;
	font-weight: 400;
	margin-bottom: 0px;'
}

h2 {
	font-family: 'Roboto';
	font-weight: 400;
}

#new {
	display: inline;
	margin-top: 0px;
	color: white;
	text-decoration: none;
	font-family: 'Roboto', sans-serif;
	font-weight: 300;
}

#new:hover {
	color: #E0E0E0;
}

#register {
	font-family: "Roboto", sans-serif;
	font-weight: 300;
	text-decoration: none;
	color: black;
}

#register:hover {
	color: grey;
}

.form-signin {
	margin-bottom: 0 !important;
}

p {
	margin-bottom: 0;
}

textarea {
	height: 218px;
	margin-bottom: 15px;
	resize: none;
}

#logout, #register {
	font-family: "Roboto", sans-serif;
	font-weight: 300;
	text-decoration: none;
}

#register:hover {
	color: #E0E0E0;
}

#logout:hover {
	color: grey;
}

#removeNote {
	display: none;
	color: grey;
	text-decoration: none;
	float: left;
	font-size: 12px;
	margin-top: 10px;
}

.form:hover #removeNote {
	display: initial;
}

hr {
	width: 50%;
	margin-top: 0;
	margin-bottom: 0;
}

#note {
	margin-top: 0.3em;
}

/* Form */

.form-signin-heading {
	margin-top: 0px !important;
	margin-bottom: 0.3em;
}

.login-page {
	width: 360px;
	padding: 8% 0 0;
	margin: auto;
}
.form {
	padding: 25px;
	margin-top: 3%;
	margin-left: 20px;
	margin-right: 20px;
	min-width: 250px;
	display: inline-block;
	position: relative;
	z-index: 1;
	background: #FFFFFF;
	text-align: center;
	box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input, .form textarea {
	font-family: "Roboto", sans-serif;
	outline: 0;
	background: #ded4d4;
	width: 100%;
	border: 0;
	margin: 0 0 15px;
	padding: 15px;
	box-sizing: border-box;
	font-size: 14px;
}
.form button {
	font-family: "Roboto", sans-serif;
	text-transform: uppercase;
	outline: 0;
	background: #66B2FF;
	width: 100%;
	border: 0;
	padding: 15px;
	color: #FFFFFF;
	font-size: 14px;
	-webkit-transition: all 0.3 ease;
	transition: all 0.3 ease;
	cursor: pointer;

}
.form button:hover,.form button:active,.form button:focus {
	background: #4fa1b6;
}
.form .message {
	margin: 15px 0 0;
	color: #b3b3b3;
	font-size: 12px;
}
.form .message a {
	color: #4CAF50;
	text-decoration: none;
}
.form .register-form {
	display: none;
}
.container, table {
	position: relative;
	z-index: 1;
	max-width: 300px;
	margin: 0 auto;
}
.container:before, .container:after {
	content: "";
	display: block;
	clear: both;
}
.container .info {
	margin: 50px auto;
	text-align: center;
}
.container .info h1 {
	margin: 0 0 15px;
	padding: 0;
	font-size: 36px;
	font-weight: 300;
	color: #1a1a1a;
}
.container .info span {
	color: #4d4d4d;
	font-size: 12px;
}
.container .info span a {
	color: #000000;
	text-decoration: none;
}
.container .info span .fa {
	color: #EF3B3A;
}

/* Dropdown content */
.dropbtn, .dropbtn1 {
	color: white;
	padding: 16px;
	font-size: 16px;
	border: none;
	cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown, .dropdown1 {
	position: relative;
	display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
	display: none;
	position: absolute;
	background-color: #f9f9f9;
	min-width: wrap;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
}

.dropdown-content1 p {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}
.dropdown-content1 p:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
	display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
	background-color: #3e8e41;
}

.dropdown1:hover .dropdown-content1 {
	display: block;
}

.dropdown1:hover .dropbtn1 {
	display: none;
}

.dropdown-content1 {
	display: none;
	background-color: #f9f9f9;
	min-width: wrap;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
}