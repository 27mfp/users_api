<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container2SvkGbj\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container2SvkGbj/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container2SvkGbj.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container2SvkGbj\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container2SvkGbj\App_KernelDevDebugContainer([
    'container.build_hash' => '2SvkGbj',
    'container.build_id' => '57c83e0e',
    'container.build_time' => 1681740945,
], __DIR__.\DIRECTORY_SEPARATOR.'Container2SvkGbj');
