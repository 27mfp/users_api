<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerOkI1qWL\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerOkI1qWL/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerOkI1qWL.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerOkI1qWL\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerOkI1qWL\App_KernelDevDebugContainer([
    'container.build_hash' => 'OkI1qWL',
    'container.build_id' => '3c0d6ad4',
    'container.build_time' => 1680509114,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerOkI1qWL');
