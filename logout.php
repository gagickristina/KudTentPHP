<?php
session_start();
session_destroy();// unistavanje sesije
header("Location:form_posebno.php");