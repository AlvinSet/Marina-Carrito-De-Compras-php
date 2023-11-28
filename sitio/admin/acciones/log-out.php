<?php

use App\Authentication\Authentication;

require_once __DIR__ . '/../../bootstrap/init.php';


(new Authentication())->logOut();

header('Location: ../index.php?section=login-view');
exit;