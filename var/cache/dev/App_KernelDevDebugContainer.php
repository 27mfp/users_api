<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerP9WXqET\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerP9WXqET/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerP9WXqET.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerP9WXqET\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerP9WXqET\App_KernelDevDebugContainer([
    'container.build_hash' => 'P9WXqET',
    'container.build_id' => 'fb2f755a',
    'container.build_time' => 1679270426,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerP9WXqET');
