<?php

print json_encode([
    "error" => true, 
    "message" => $exception->getMessage(), 
    "trace" => $exception->getTraceAsString()
]);
