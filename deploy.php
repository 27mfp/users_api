<?php
namespace Deployer;

require 'recipe/symfony.php';

// Config

set('repository', 'https://github.com/27mfp/users_api.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('18.169.238.252')
    ->set('remote_user', 'deployer')
    ->set('deploy_path', '~/users_api');

// Hooks

after('deploy:failed', 'deploy:unlock');
