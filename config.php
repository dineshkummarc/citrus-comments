<?php
return [
    Config\DatabaseInterface::class => DI\Factory([Config\MySQLDatabase::class, 'getInstance'])
];