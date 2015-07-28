<?php

$hook['pre_controller'] = array(
                                'class'    => 'acl',
                                'function' => 'isAllowed',
                                'filename' => 'acl.php',
                                'filepath' => 'hooks',
                                'params'   => array($_GET)
                                );
?>
